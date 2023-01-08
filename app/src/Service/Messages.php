<?php

namespace App\Service;

use App\DTO\Messages as DTOMessages;
use App\Entity\Message;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;

class Messages {
    private $logger;
    private $registry;
    private $messageRepository;

    public function __construct(LoggerInterface $logger, ManagerRegistry $registry)
    {
        $this->logger = $logger;
        $this->registry = $registry->getManager();
        $this->messageRepository = $registry->getRepository(Message::class);
    }

    public function postMessage(string $message) {
        $this->logger->info('Called "postMessage".');

        $entity = new Message();
        $entity->setMessage($message);

        $this->registry->persist($entity);
    }

    public function getMessages(): DTOMessages {
        $this->logger->info('Called "getMessages".');
        // TODO: switch the following dummy with real data from the database

        $messages = $this->messageRepository->findAll();

        /** @var DTOMessages $response */
        $response = new DTOMessages();
        $response->setSuccess(true);
        $response->addMessages(...$messages);
        return $response;
    }
}