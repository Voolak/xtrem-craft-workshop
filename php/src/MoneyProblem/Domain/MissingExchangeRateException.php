<?php

namespace MoneyProblem\Domain;

class MissingExchangeRateException extends \Exception
{

    public function __construct(Currency $fromCurrency, Currency $toCurrency)
    {
        $message = sprintf('%s->%s', $fromCurrency, $toCurrency);
        parent::__construct($message);
    }
}