<?php

namespace App\Services\OrderCheckers;

use App\Services\Entities\Order;

interface OrderCheckable
{
    public function check(Order $order): void;
}
