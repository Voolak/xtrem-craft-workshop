<?php

namespace MoneyProblem\Domain;

use function array_key_exists;

class Bank
{
    private $exchangeRates = [];

    public function __construct(array $exchangeRates = [])
    {
        $this->exchangeRates = $exchangeRates;
    }

    public static function create(Currency $fromCurrency, Currency $toCurrency, float $rate): Bank
    {
        $bank = new Bank([]);
        $bank->addExchangeRate($fromCurrency, $toCurrency, $rate);

        return $bank;
    }

    public function addExchangeRate(Currency $fromCurrency, Currency $toCurrency, float $rate): void
    {
        $this->exchangeRates[($fromCurrency . '->' . $toCurrency)] = $rate;
    }

    public function convert(float $amount, Currency $fromCurrency, Currency $toCurrency): float
    {
        if ($fromCurrency == $toCurrency) {
            return $amount;
        }

        $exchangeRateKey = $fromCurrency . '->' . $toCurrency;

        if (!array_key_exists($exchangeRateKey, $this->exchangeRates)) {
            throw new MissingExchangeRateException($fromCurrency, $toCurrency);
        }

        return $amount * $this->exchangeRates[$exchangeRateKey];
    }
}
