<?php

namespace App\Services\OrderCheckers;

use App\Exceptions\InvalidOrderException;
use App\Services\Entities\Order;
use App\Services\Enums\Currency;

class CurrencyChecker implements OrderCheckable
{
    private const ValidCurrencies = [Currency::TWD, Currency::USD];

    public function check(Order $order): void
    {
        if (! in_array($order->getCurrency(), $this::ValidCurrencies)) {
            throw new InvalidOrderException('Currency format is wrong');
        }
    }
}
