<?php

namespace App\Services;

use App\Services\Entities\Order;
use App\Services\OrderCheckers\OrderCheckable;
use Illuminate\Support\Collection;

class CheckOrderFormatService
{
    /** @var Collection<OrderCheckable> */
    private Collection $checkers;

    public function __construct(Collection $checkers)
    {
        $this->checkers = $checkers;
    }

    public function check(Order $order): void
    {
        $this->checkers->each(function (OrderCheckable $checker) use ($order) {
            $checker->check($order);
        });
    }
}
