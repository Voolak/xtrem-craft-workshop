<?php

namespace MoneyProblem\Domain;

class MoneyCalculator
{
    public static function add(float $fromAmount, Currency $fromCurrency, float $toAmount, Currency $toCurrency, Bank $bank): float
    {
        $toAmount = $bank->convert($toAmount,$toCurrency,$fromCurrency);
        return $fromAmount + $toAmount;
    }

    public static function times(float $amount, int $value): float
    {
        return $amount * $value;
    }

    public static function divide(float $amount, int $value): float
    {
        if ($value === 0){
            throw new \InvalidArgumentException("Division by zero");
        }
        return $amount / $value;
    }
}