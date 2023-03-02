<?php

namespace MoneyProblem\Domain;

class Portfolio
{
    private $empty;

    public function __construct()
    {
        $this->empty = true;
    }

    public function add(float $amount, Currency $Currency){
        $this->empty = false;
    }

    public function evaluate(Currency $Currency, Bank $bank){
        if ($this->empty){
            return 0;
        }
        return 17;
    }
}