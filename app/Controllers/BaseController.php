<?php

namespace App\Controllers;

use App\Response\ResponseInterface;

class BaseController
{
    protected ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }
}