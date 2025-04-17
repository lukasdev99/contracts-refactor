<?php

namespace App\Response;

class JsonResponse implements ResponseInterface
{
    public function json(array $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public function success(string $message = 'OK', array $data = [], int $status = 200): void
    {
        $this->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public function error(string $message = 'Error', array $errors = [], int $status = 400): void
    {
        $this->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}