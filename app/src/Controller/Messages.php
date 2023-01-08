<?php

namespace App\Controller;

use App\Service\Messages as ServiceMessages;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Messages extends AbstractController
{
    private $logger;
    private $messagesService;

    public function __construct(LoggerInterface $logger, ServiceMessages $messagesService)
    {
        $this->logger = $logger;
        $this->messagesService = $messagesService;
    }

    #[Route('/messages', name: 'postMessage', methods: 'POST')]
    public function postMessage(): Response
    {
        try {
            $this->messagesService->postMessage('My test message');
            $response = ['success' => true];
            return new JsonResponse(data: $response, status: Response::HTTP_OK);

            // TODO: catch custom exception passed from within the service
        } catch (\Throwable $th) {
            $this->logger->error($th->getMessage(), $th->getTrace());
            return new JsonResponse(
                data: ['error' => 'ERROR_01'],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    #[Route('/messages', name: 'getMessages', methods: 'GET')]
    public function getMessages(): Response
    {
        try {
            $response = $this->messagesService->getMessages();
            return new JsonResponse(data: $response, status: Response::HTTP_OK);
        } catch (\Throwable $th) {
            $this->logger->error($th->getMessage(), $th->getTrace());
            return new JsonResponse(
                data: ['error' => 'ERROR_01'],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    #[Route('/messages/{id}', name: 'message', methods: 'GET')]
    public function message(int $id): Response
    {
        $response = ['success' => true];
        return new JsonResponse(data: $response, status: Response::HTTP_OK);
    }
}
