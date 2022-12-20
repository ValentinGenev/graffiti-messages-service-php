<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Messages
{
    #[Route('/messages', name: 'messages', methods: 'GET')]
    public function messages(): Response
    {
        try {
            $response = ['messages' => []];
            return new JsonResponse(data: $response, status: Response::HTTP_OK);
        } catch (\Throwable $th) {
            // TODO: add logger
            // TODO: add error dictionary
            return new JsonResponse(data: ['error' => 'ERROR_01'],
                status: Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route('/messages/{id}', name: 'message', methods: 'GET')]
    public function message(int $id): Response
    {
        $response = ['success' => true];

        return new JsonResponse(data: $response, status: Response::HTTP_OK);
    }
}
