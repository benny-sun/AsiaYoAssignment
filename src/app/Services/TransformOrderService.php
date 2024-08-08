<?php

namespace App\Services;

use App\Services\Currency\Currency;
use App\Services\Currency\TWD;
use App\Services\Entities\Order;

class TransformOrderService
{

    public function __construct(
        private readonly CheckOrderFormatService $orderFormatService,
        private readonly CurrencyConverterService $currencyConverter
    ) {}

    public function transform(Order $order): Order
    {
        $this->orderFormatService->check($order);
        $this->transformOrderPrice($order, new TWD());

        return $order;
    }

    private function transformOrderPrice(Order $order, Currency $currency): void
    {
        $priceTWD = $this->currencyConverter
            ->convert($order->getPrice(), $order->getCurrency(), $currency);
        $order->setPrice($priceTWD);
        $order->setCurrency($currency);
    }
}
