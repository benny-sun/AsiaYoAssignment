<?php

namespace App\Services;

use App\Services\Currency\Currency;

class CurrencyConverterService
{
    public function convert(float $amount, Currency $from, Currency $to): float
    {
        // convert the current price to TWD
        $priceTWD = $amount * $from->rate();

        // calculate the new price in the target currency
        return $priceTWD / $to->rate();
    }
}
