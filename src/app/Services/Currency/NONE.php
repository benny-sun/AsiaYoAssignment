<?php

namespace App\Services\Currency;

final class NONE implements Currency
{
    public function code(): string
    {
        return '';
    }

    public function rate(): float
    {
        return -1.0;
    }
}
