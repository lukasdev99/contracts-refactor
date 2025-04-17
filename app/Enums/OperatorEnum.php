<?php

namespace App\Enums;

enum OperatorEnum: string
{
    case EQUAL = '=';
    case GREATER_THAN = '>';
    case LESS_THAN = '<';
    case NOT_EQUAL = '!=';
}