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

    private function divide(float $amount, int $value): float
    {
        if ($value === 0){
            throw new \InvalidArgumentException("Division by zero");
        }
        return $amount / $value;
    }
}