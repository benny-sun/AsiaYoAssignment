<?php

namespace App\Services\OrderCheckers;

use App\Exceptions\InvalidOrderException;
use App\Services\Currency\TWD;
use App\Services\CurrencyConverterService;
use App\Services\Entities\Order;

class PriceChecker implements OrderCheckable
{

    private const PriceLimit = 2000;

    public function __construct(private readonly CurrencyConverterService $currencyConverter) {}

    public function check(Order $order): void
    {
        $price = $this->currencyConverter
            ->convert($order->getPrice(), $order->getCurrency(), new TWD());

        if ($price > $this::PriceLimit) {
            throw new InvalidOrderException('Price is over ' . $this::PriceLimit);
        }
    }
}
