<?php

namespace MoneyProblem\Domain;

class Money
{
    private $amount;
    private $currency;

    public function __construct($amount,$currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }


    public function add(float $value)
    {
        $this->amount  += $value;
    }

    public function times(float $value)
    {
        $this->amount  *= $value;
    }

    public function divide(float $value)
    {
        if ($value <= 0){
            throw new \InvalidArgumentException("Division by zero or less");
        }
        $this->amount /= $value;
    }
}