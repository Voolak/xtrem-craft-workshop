<?php

namespace MoneyProblem\Domain;

class MoneyCalculator
{
    public static function add(float $fromAmount, Currency $fromCurrency, float $toAmount, Currency $toCurrency, Bank $bank): float
    {
        $toAmount = $bank->convertOld($toAmount,$toCurrency,$fromCurrency);
        return $fromAmount + $toAmount;
    }

    public static function times(float $amount, float $value): float
    {
        if ($value <= 0){
            throw new \InvalidArgumentException("Negative Multiplication");
        }
        return $amount * $value;
    }
};