<?php

namespace App\Services;

use App\DTOs\Contracts\ContractsDTO;
use App\Models\Contracts;

class ContractService
{
    public function getContracts(ContractsDTO $dto)
    {
        $model = new Contracts();
        $model->getFilteredContracts($dto);
    }
}