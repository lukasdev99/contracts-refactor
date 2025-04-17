<?php

namespace App\Response\Contracts;

use App\Response\JsonResponse;

class ContractsResponse extends JsonResponse
{
    public function validationFailed(array $errors): void
    {
        $this->error('Validation failed', $errors, 422);
    }

    public function operationPerformed(array $data): void
    {
        $this->success('Operation performed succesfully', $data, 200);
    }
}