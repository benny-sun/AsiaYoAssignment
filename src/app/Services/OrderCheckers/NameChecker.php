<?php

namespace App\Services\OrderCheckers;

use App\Exceptions\InvalidOrderException;
use App\Services\Entities\Order;

class NameChecker implements OrderCheckable
{
    public function check(Order $order): void
    {
        if (! preg_match('/^[A-Za-z\s]+$/', $order->getName())) {
            throw new InvalidOrderException('Name contains non-English characters');
        }

        if (! preg_match('/^[A-Z]/', $order->getName())) {
            throw new InvalidOrderException('Named is not capitalized');
        }
    }
}
