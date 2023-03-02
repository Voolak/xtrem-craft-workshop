<?php

namespace Tests\MoneyProblem\Domain;

use MoneyProblem\Domain\Bank;
use MoneyProblem\Domain\Currency;
use MoneyProblem\Domain\MissingExchangeRateException;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    public function testConvertEurToUsd()
    {
        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        // Act
        $result = $bank->convert(10, Currency::EUR(), Currency::USD());

        // Assert
        $this->assertEquals(12, $result);
    }

    public function testConvertEurToEurRemainsUnchanged()
    {
        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        // Act
        $result = $bank->convert(10, Currency::EUR(), Currency::EUR());

        // Assert
        $this->assertEquals(10, $result);
    }

    public function testUnknownConversion()
    {
        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        // Assert
        $this->expectException(MissingExchangeRateException::class);
        $this->expectExceptionMessage('EUR->KRW');

        // Act
        $bank->convert(10, Currency::EUR(), Currency::KRW());
    }

    public function testChangeExchangeRates()
    {
        // Arrange
        $bank = Bank::create(Currency::EUR(), Currency::USD(), 1.2);

        // Act
        $result1 = $bank->convert(10, Currency::EUR(), Currency::USD());

        $bank->addExchangeRate(Currency::EUR(), Currency::USD(), 1.3);

        $result2 = $bank->convert(10, Currency::EUR(), Currency::USD());

        // Assert
        $this->assertEquals(12, $result1);
        $this->assertEquals(13, $result2);
    }
}
