<?php

namespace Tests\Unit;

use App\Services\Currency\NONE;
use App\Services\Currency\TWD;
use App\Services\Entities\Order;
use App\Exceptions\InvalidOrderException;
use App\Services\OrderCheckers\CurrencyChecker;
use PHPUnit\Framework\TestCase;

class CurrencyCheckerTest extends TestCase
{
    public function test_valid_currency()
    {
        // arrange
        $stubOrder = $this->createMock(Order::class);
        $stubOrder->method('getCurrency')->willReturn(new TWD());

        // act
        $sut = new CurrencyChecker();
        $sut->check($stubOrder);

        // assert
        $this->addToAssertionCount(1);
    }

    public function test_invalid_currency()
    {
        // arrange
        $stubOrder = $this->createMock(Order::class);
        $stubOrder->method('getCurrency')->willReturn(new NONE());

        // assert exception
        $this->expectException(InvalidOrderException::class);

        // act
        $sut = new CurrencyChecker();
        $sut->check($stubOrder);
    }
}
