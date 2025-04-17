<?php

namespace App\Controllers;

class BaseController
{
    protected function json(array $data = [], int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    protected function success(string $message = 'OK', array $data = []): void
    {
        $this->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function error(string $message = 'Error', int $status = 500): void
    {
        $this->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}