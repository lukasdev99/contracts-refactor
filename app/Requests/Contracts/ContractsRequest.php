<?php

namespace App\Requests\Contracts;

use App\Requests\BaseRequest;
use App\Validation\Rules\RequiredRule;

class ContractsRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'nazwa_przedsiebiorcy' => [new RequiredRule()],
            'NIP' => [new RequiredRule()],
            'kwota' => [new RequiredRule()]
        ];
    }
}