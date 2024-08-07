<?php

namespace App\Services;

use App\Services\Entities\Order;
use App\Services\Enums\Currency;

class TransformOrderService
{

    public function __construct(private readonly CheckOrderFormatService $orderFormatService) {}

    public function transform(Order $order): Order
    {
        $this->orderFormatService->check($order);
        $order->setCurrency(Currency::TWD);

        return $order;
    }
}
