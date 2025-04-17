<?php

namespace App\Enums\Contracts;

enum ContractSortEnum: string
{
    case NAZWA_NIP_DESC = 'nazwa_przedsiebiorcy DESC, NIP DESC';
    case KWOTA_DESC = 'kwota DESC';
    case ID_ASC = 'id ASC';
}