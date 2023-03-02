<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Bank;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\Portfolio;
use PHPUnit\Framework\TestCase;

class PortfolioTest extends TestCase
{
    public function testAddInDiffrentCurrency()
    {

        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);
        $bank->create(Currency::USD(), Currency::KRW(), 1100);
        $portfolio = new Portfolio;
        $portfolio2 = new Portfolio;

        // Act
        $portfolio->add(5, Currency::USD());
        $portfolio->add(10, Currency::EUR());

        $portfolio2->add(1, Currency::USD());
        $portfolio2->add(1100, Currency::KRW());

        $result = $portfolio->evaluate(Currency::USD(), $bank);
        $result2 = $portfolio2->evaluate(Currency::KRW(), $bank);

        // Assert
        $this->assertEquals(17, $result);
        $this->assertEquals(2200, $result2);
    }

    public function testEmptyPortfolio()
    {

        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);
        $portfolio = new Portfolio;

        // Act

        $result = $portfolio->evaluate(Currency::USD(), $bank);

        // Assert
        $this->assertEquals(0, $result);
    }
}
