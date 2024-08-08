<?php

namespace App\Services\OrderCheckers;

use App\Exceptions\InvalidOrderException;
use App\Services\Currency\TWD;
use App\Services\Currency\USD;
use App\Services\Entities\Order;

class CurrencyChecker implements OrderCheckable
{
    private const ValidCurrencies = [TWD::class, USD::class];

    public function check(Order $order): void
    {
        if (! in_array(get_class($order->getCurrency()), $this::ValidCurrencies)) {
            throw new InvalidOrderException('Currency format is wrong');
        }
    }
}
