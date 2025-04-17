<?php 

namespace App\Validation\Rules;

use App\Validation\Rules\RuleInterface;

class RequiredRule implements RuleInterface
{
    public function validate(string $field, mixed $value): bool
    {
        return $value !== null && $value !== '';
    }

    public function message(string $field): string
    {
        return "Field '{$field}' is required!";
    }
}