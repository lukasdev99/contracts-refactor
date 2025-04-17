<?php

namespace App\Requests;

use App\Traits\ValidatesInput;

abstract class BaseRequest
{
    use ValidatesInput;

    protected array $data;
    protected array $errors = [];

    public function __construct(array $data = [])
    {
        $this->data = $data ?: $this->getDataFromRequest();
    }

    protected function getDataFromRequest(): array
    {
        switch($_SERVER['REQUEST_METHOD']){
            case 'GET':
                return $_GET; break;
            case 'POST':
                return $_POST; break;
            default: return []; break;
        }
    }

    abstract public function rules(): array; 

    public function validate(): bool
    {
        $this->errors = [];
        
        foreach($this->rules() as $field => $rules)
        {
            $this->validateField($field, $rules);
        }

        return empty($this->errors);
    }

    protected function validateField(string $field, array $rules): void
    {
        $value = $this->data[$field] ?? null;
        foreach($rules as $rule)
        {
            if($this->shouldSkipRule($value, $rule))
                continue;
            if(!$rule->validate($field, $value))
                $this->errors[$field] = $rule->message($field);
                break;
        }
    }

    protected function shouldSkipRule(mixed $value, object $rule): bool
    {
        return $this->isEmpty($value) && !$rule instanceof \App\Validation\Rules\RequiredRule;
    }
}