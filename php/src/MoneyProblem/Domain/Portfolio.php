<?php

namespace MoneyProblem\Domain;

class Portfolio
{
    private $empty; 
    private $money;

    public function __construct()
    {
        $this->money = [];
    }

    public function add(float $amount, Currency $currency){
        $this->money[] = new money($amount,$currency);
        $this->empty = false;
    }

    public function evaluate(Currency $currency, Bank $bank){
        if ($this->empty){
            return 0;
        }

        $moneyTotal = new Money(0, $currency);
        foreach ($this->money as $moneyValue){
            if ($moneyValue->getCurrency() == $currency){
                $moneyTotal = $moneyTotal->add($moneyValue);
            } else {
                $money2 = $bank->convert($moneyValue,$currency);
                $moneyTotal = $moneyTotal->add($money2);
            }
        }
        return $moneyTotal;
    }
}