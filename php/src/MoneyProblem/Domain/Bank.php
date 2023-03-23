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

    public function convertOld(float $amount, Currency $fromCurrency, Currency $toCurrency): float
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

    public function canConvert(Currency $currency, Currency $to){
        //On cherche si il y'a un exchange rate entre $currency -> $to
        return $currency == $to || array_key_exists($this->getKey($currency, $to), $this->exchangeRates);
    }

    public function convert(Money $money, Currency $currency){
        if (!($this->canConvert($money->getCurrency(),$currency))){
            throw new \MoneyProblem\Domain\MissingExchangeRateException($money->getCurrency(),$currency);
        }
        return $this->convertSafely($money,$currency);
    }

    public function convertSafely(Money $money, Currency $currency){
        return $money->getCurrency() == $currency
            ? $money
            : new Money($money->getAmount() * $this->exchangeRates[$this->getKey($money->getCurrency(), $currency)],$currency);
    }

    public function getKey(Currency $currency, Currency $to){
        return $currency . '->' . $to;
    }
}
