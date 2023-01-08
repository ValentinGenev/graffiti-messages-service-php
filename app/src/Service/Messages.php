<?php

namespace App\Service;

use App\DTO\Messages as DTOMessages;
use App\Entity\Message;
use DateTime;
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
        $entity->setPostDate(new DateTime('now'));

        $this->registry->persist($entity);
        $this->registry->flush();
    }

    public function getMessages(): DTOMessages {
        $this->logger->info('Called "getMessages".');

        $messages = $this->messageRepository->findAll();

        /** @var DTOMessages $response */
        $response = new DTOMessages();
        $response->setSuccess(true);
        $response->addMessages(...$messages);
        return $response;
    }
}