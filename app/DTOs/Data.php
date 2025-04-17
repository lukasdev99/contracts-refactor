<?php

namespace App\DTOs;

abstract class Data
{
    public static function fromArray(array $data): static
    {
        return new static(...$data);
    }
}