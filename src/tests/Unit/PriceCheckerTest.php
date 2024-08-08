<?php

namespace Tests\Unit;

use App\Exceptions\InvalidOrderException;
use App\Services\CurrencyConverterService;
use App\Services\Entities\Order;
use App\Services\OrderCheckers\PriceChecker;
use PHPUnit\Framework\TestCase;

class PriceCheckerTest extends TestCase
{
    public function test_valid_price()
    {
        // arrange
        $stubPrice = $this->createMock(CurrencyConverterService::class);
        $stubPrice->method('convert')
            ->willReturn(1950.0);
        $stubOrder = $this->createMock(Order::class);

        // act
        $sut = new PriceChecker($stubPrice);
        $sut->check($stubOrder);

        // assert
        $this->addToAssertionCount(1);
    }

    public function test_invalid_price()
    {
        // arrange
        $stubPrice = $this->createMock(CurrencyConverterService::class);
        $stubPrice->method('convert')
            ->willReturn(2050.0);
        $stubOrder = $this->createMock(Order::class);

        // assert exception
        $this->expectException(InvalidOrderException::class);

        // act
        $sut = new PriceChecker($stubPrice);
        $sut->check($stubOrder);
    }
}
