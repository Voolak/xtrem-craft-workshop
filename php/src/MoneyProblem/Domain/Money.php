<?php

namespace MoneyProblem\Domain;

class Money
{
    private $amount;
    private $currency;

    public function __construct(float $amount, Currency $currency)
    {
        if ($amount < 0) {
            throw new \InvalidArgumentException("No negative amount allowed");
        }
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getCurrency(){
        return $this->currency;
    }

    public function add(Money $money)
    {
        return new Money($this->amount + $money->amount, $this->currency);
    }

    public function times(float $value)
    {
        if ($value < 0){
            throw new \InvalidArgumentException("Multiplication by a negative number");
        }
        return new Money($this->amount * $value, $this->currency);
    }

    public function divide(float $value)
    {
        if ($value <= 0){
            throw new \InvalidArgumentException("Division by zero or less");
        }
        return new Money($this->amount / $value, $this->currency);
    }
}