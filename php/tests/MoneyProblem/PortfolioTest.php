<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Bank;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\Portfolio;
use MoneyProblem\Domain\Money;
use PHPUnit\Framework\TestCase;

class PortfolioTest extends TestCase
{
    public function testAddInDiffrentCurrency()
    {

        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);
        $bank->addExchangeRate(Currency::USD(), Currency::KRW(), 1100);
        $bank->addExchangeRate(Currency::USD(), Currency::EUR(), 0.82);
        $bank->addExchangeRate(Currency::EUR(), Currency::KRW(), 1344);
        $portfolio = new Portfolio;
        $portfolio2 = new Portfolio;
        $money = new Money(17,Currency::USD());
        $money2 = new Money(2200,Currency::KRW());
        $money3 = new Money(14.1,Currency::EUR());
        $money4 = new Money(18940,Currency::KRW());

        // Act
        $portfolio->add(5, Currency::USD());
        $portfolio->add(10, Currency::EUR());

        $portfolio2->add(1, Currency::USD());
        $portfolio2->add(1100, Currency::KRW());

        $result = $portfolio->evaluate(Currency::USD(), $bank);
        $result2 = $portfolio2->evaluate(Currency::KRW(), $bank);
        $result3 = $portfolio->evaluate(Currency::EUR(), $bank);
        $result4 = $portfolio->evaluate(Currency::KRW(), $bank);

        // Assert
        $this->assertEquals($money, $result);
        $this->assertEquals($money2, $result2);
        $this->assertEquals($money3, $result3);
        $this->assertEquals($money4, $result4);
    }

    public function testEmptyPortfolio()
    {

        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);
        $portfolio = new Portfolio;
        $money = new Money(0, Currency::USD());
        // Act

        $result = $portfolio->evaluate(Currency::USD(), $bank);

        // Assert
        $this->assertEquals($money, $result);
    }
}
