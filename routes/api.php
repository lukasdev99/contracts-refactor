<?php

use App\Controllers\Contracts\ContractsController;

return [
    'POST' => [
        '/api/contracts' => [ContractsController::class, 'index']
    ],
];