<?php

namespace App\Services\Currency;

final class TWD implements Currency
{
    public function code(): string
    {
        return 'TWD';
    }

    public function rate(): float
    {
        return 1.0; // Assuming TWD is the base currency
    }
}
