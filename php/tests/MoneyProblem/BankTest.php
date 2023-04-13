<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Bank;
use MoneyProblem\Domain\BankBuilder;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\MissingExchangeRateException;
use MoneyProblem\Domain\Money;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    public function testConvertEurToUsd()
    {
        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        $bank1 = BankBuilder::aBank()->withPivotCurrency(Currency::EUR())->withExchangeRate(Currency::USD(), 1.2);

        $money = new Money(10,Currency::EUR());
        $moneyUsd = new Money(12,Currency::USD());

        // Act
        $result = $bank->convert($money,Currency::USD());

        // Assert
        $this->assertEquals($moneyUsd, $result);
    }

    public function testConvertEurToEurRemainsUnchanged()
    {
        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);
        $money = new Money(10, Currency::EUR());

        // Act
        $result = $bank->convert($money, Currency::EUR());

        // Assert
        $this->assertEquals($money, $result);
    }

    public function testUnknownConversion()
    {
        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);
        $money = new Money(10,Currency::EUR());

        // Assert
        $this->expectException(MissingExchangeRateException::class);
        $this->expectExceptionMessage('EUR->KRW');

        // Act
        $bank->convert($money, Currency::KRW());
    }

    public function testChangeExchangeRates()
    {
        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);
        $money = new Money(12,Currency::USD());
        $money2 = new Money(13,Currency::USD());
        $money3 = new Money(10,Currency::EUR());

        // Act
        $result1 = $bank->convert($money3, Currency::USD());

        $bank->addExchangeRate(Currency::EUR(), Currency::USD(), 1.3);

        $result2 = $bank->convert($money3, Currency::USD());

        // Assert
        $this->assertEquals($money, $result1);
        $this->assertEquals($money2, $result2);
    }
}
