<?php

namespace App\Models;

use App\Database\BaseModel;
use App\DTOs\Contracts\ContractsDTO;
use App\Enums\Contracts\ContractColumnEnum;
use App\Enums\OperatorEnum;

class Contracts extends BaseModel
{
    protected string $table = 'contracts';

    public function getFilteredContracts(ContractsDTO $dto)
    {
        $conditions = [];

        if (!empty($dto['id'])) {
            $conditions[] = [
                'column' => ContractColumnEnum::ID,
                'operator' => OperatorEnum::EQUAL,
                'value' => $dto['id']];
        }

        if (!empty($dto['min_amount'])) {
            $conditions[] = ['column' => 'kwota', 'operator' => '>', 'value' => $dto['min_amount']];
        }

        $orderBy = match($filters['sort'] ?? null) {
            1 => 'nazwa_przedsiebiorcy DESC, NIP DESC',
            2 => 'kwota DESC',
            default => 'id ASC'
        };
    }

}