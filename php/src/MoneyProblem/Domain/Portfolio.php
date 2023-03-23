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
        $this->money[] = [$amount,$currency];
        $this->empty = false;
    }

    public function evaluate(Currency $currency, Bank $bank){
        if ($this->empty){
            return 0;
        }
        $total = 0;

        foreach ($this->money as $value){

            if ($value[1] == $currency){
                $total += $value[0];
            } else {
                $total += $bank->convert($value[0],$value[1],$currency);
            }
        }
        return $total;
    }
}