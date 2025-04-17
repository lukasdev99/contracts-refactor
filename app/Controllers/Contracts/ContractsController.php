<?php

namespace App\Controllers\Contracts;

use App\Services\ContractService;
use App\Controllers\BaseController;
use App\Requests\Contracts\ContractsRequest;
use App\Response\Contracts\ContractsResponse;

class ContractsController extends BaseController
{
    public ContractService $cService;
    
    public function __construct()
    {
        parent::__construct(new ContractsResponse());
        $this->cService = new ContractService();
    }

    public function showWith(ContractsRequest $request): void
    { 
        if(!$request->validate())
        {
            $this->response->validationFailed($request->errors());
            return;
        }
        $dto = $request->getData();
        $contracts = $this->cService->getContracts($dto);
        
        $this->response->operationPerformed([
            'id' => $dto->id,
            'nazwa_przedsiebiorcy' => $dto->nazwa_przedsiebiorcy,
            'nip' => $dto->NIP,
            'kwota' => $dto->kwota,
        ]);
    }
}