<?php

namespace App\Enums\Contracts;

enum ContractColumnEnum: string
{
    case ID = 'id';
    case KWOTA = 'kwota';
    case NAZWA_PRZEDSIEBIORCY = 'nazwa_przedsiebiorcy';
    case NIP = 'NIP';
}