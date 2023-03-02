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
        $portfolio = new Portfolio;

        // Act
        $portfolio->add(5, Currency::USD());
        $portfolio->add(10, Currency::EUR());

        $result = $portfolio->evaluate(Currency::USD(), $bank);

        // Assert
        $this->assertEquals(17,$result);
    }

    public function testEmptyPortfolio()
    {

        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);
        $portfolio = new Portfolio;

        // Act

        $result = $portfolio->evaluate(Currency::USD(), $bank);

        // Assert
        $this->assertEquals(0,$result);
    }
}
