<?php

namespace App\Services\OrderCheckers;

use App\Exceptions\InvalidOrderException;
use App\Services\Entities\Order;
use App\Services\Enums\Currency;

class PriceChecker implements OrderCheckable
{

    private const PriceLimit = 2000;

    public function check(Order $order): void
    {
        $price = $order->getPrice();

        if ($order->getCurrency() === Currency::USD) {
            $price *= Currency::USD->rate();
        }

        if ($price > $this::PriceLimit) {
            throw new InvalidOrderException('Price is over ' . $this::PriceLimit);
        }
    }
}
