<?php

namespace Tests\Unit;

use App\Services\Currency\CurrencyFactory;
use App\Services\Currency\NONE;
use App\Services\Currency\TWD;
use PHPUnit\Framework\TestCase;

class CurrencyFactoryTest extends TestCase
{
    public function test_exists_currency()
    {
        $currency = CurrencyFactory::create('TWD');
        $this->assertTrue($currency instanceof TWD);
    }

    public function test_not_exists_currency()
    {
        $currency = CurrencyFactory::create('XYZ');
        $this->assertTrue($currency instanceof NONE);
    }
}
