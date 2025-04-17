<?php

namespace App\DTOs\Contracts;

use App\DTOs\Data;

class ContractsDTO extends Data
{
    public function __construct(
        public int $id,
        public string $nazwa_przedsiebiorcy,
        public string $NIP,
        public string $kwota  
    ){}
}