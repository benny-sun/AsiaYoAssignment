<?php

namespace App\Services\Currency;

final class USD implements Currency
{
    public function code(): string
    {
        return 'USD';
    }

    public function rate(): float
    {
        return 31.0;
    }
}
