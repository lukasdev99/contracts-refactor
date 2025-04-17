<?php

namespace App\Validation\Rules;

interface RuleInterface
{
    public function validate(string $field, mixed $value): bool;
    public function message(string $field): string;
}