<?php

namespace App\Services\Currency;

interface Currency
{
    public function code(): string;
    public function rate(): float;
}
