<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Bank;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\MoneyCalculator;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testAddInUSD()
    {
        // Arrange
        $bank = Bank::create(Currency::USD(), Currency::USD(), 1);

        // Act
        $result1 = MoneyCalculator::add(5, Currency::USD(), 10, Currency::USD(), $bank);
        $result2 = MoneyCalculator::add(5, Currency::USD(), 10, Currency::USD(), $bank);

        // Assert
        $this->assertIsFloat($result1);
        $this->assertNotNull($result2);
    }

    public function testMultiplyInEUR()
    {
        // Act
        $result = MoneyCalculator::times(10, 2);

        // Assert
        $this->assertLessThan($result, 0);
    }

    public function testDivideInKWR()
    {
        // Act
        $result = MoneyCalculator::divide(8, 4);

        // Assert
        $this->assertEquals(2, $result);
    }
}
