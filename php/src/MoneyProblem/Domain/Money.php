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


    private function add(float $fromAmount, Currency $fromCurrency, float $toAmount, Currency $toCurrency, Bank $bank): float
    {
        $toAmount = $bank->convert($toAmount,$toCurrency,$fromCurrency);
        return $fromAmount + $toAmount;
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