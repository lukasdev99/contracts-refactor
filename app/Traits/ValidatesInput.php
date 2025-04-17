<?php

namespace App\Traits;

trait ValidatesInput
{
    protected array $validationData = [];
    protected array $errors = [];

    protected function isEmpty(mixed $value): bool
    {
        return $value === null || $value === '';
    }

    public function fails(): bool
    {
        return !$this->validate();
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function all(): array
    {
        return $this->validationData;
    }

    public function input(string $key, $default = null)
    {
        return $this->validationData[$key] ?? $default;
    }
}