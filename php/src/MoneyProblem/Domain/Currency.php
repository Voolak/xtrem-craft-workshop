<?php

namespace MoneyProblem\Domain;

use MyCLabs\Enum\Enum;

class Currency extends Enum
{
    public const USD = "USD";
    public const EUR = 'EUR';
    public const KRW = "KRW";
}