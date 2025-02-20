<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Bank;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\MoneyCalculator;
use MoneyProblem\Domain\Money;
use PHPUnit\Framework\TestCase;
use Pitchart\Phlunit\Check;

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

    public function testAddInDiffrentCurrency()
    {
        // Arrange
        $bank = Bank::create(Currency::KRW(), Currency::USD(), 0.5);

        // Act
        $result1 = MoneyCalculator::add(5, Currency::USD(), 10, Currency::KRW(), $bank);
        $result2 = MoneyCalculator::add(5, Currency::USD(), 10, Currency::KRW(), $bank);

        // Assert
        $this->assertEquals(10,$result1);
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
        $result = MoneyCalculator::times(8, 0.25);

        // Assert
        $this->assertEquals(2, $result);
    }

    public function testNegativeMultiplication()
    {
        // Act
        $result = MoneyCalculator::times(8, 0.25);

        // Assert
        $this->assertEquals(2, $result);
    }


    public function testAddidtionMoney(){
        
        $money = new Money(10,Currency::EUR());
        $money2 = $money->add(new Money(2, Currency::EUR()));

        $this->assertEquals(new Money(12,Currency::EUR()),$money2);
    }

    public function testMultiplicationMoney(){
        $money = new Money(10,Currency::EUR());
        $money2 = $money->times(2);

        $this->assertEquals(new Money(20,Currency::EUR()),$money2);
    }

    public function testDivisionMoney(){

        $money = new Money(10,Currency::EUR());
        $money2 = $money->divide(5);

        $this->assertEquals(new Money(2,Currency::EUR()),$money2);
    }

    public function testNegativeMoney(){
        $action = fn() => new Money(-10,Currency::EUR());

        Check::thatCall($action)->throws(\InvalidArgumentException::class);
    }
}
