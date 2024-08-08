<?php

namespace Tests\Unit;

use App\Services\CurrencyConverterService;
use App\Services\Currency\TWD;
use App\Services\Currency\USD;
use PHPUnit\Framework\TestCase;

class CurrencyConverterTest extends TestCase
{
    public function test_currency_convert()
    {
        $converter = new CurrencyConverterService();
        $amount = $converter->convert(100.0, new USD(), new TWD());
        $this->assertEquals(3100.0, $amount);
    }
}
