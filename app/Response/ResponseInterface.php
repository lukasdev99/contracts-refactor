<?php

namespace App\Response;

interface ResponseInterface

{
    public function json(array $data, int $status = 200): void;
    public function success(string $message = 'OK', array $data = [], int $status = 200): void;
    public function error(string $message = 'Error', array $errors = [], int $status = 500): void;
}