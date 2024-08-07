<?php

namespace App\Services\Enums;

enum Currency: string
{
    case USD = 'USD';
    case TWD = 'TWD';
    case NONE = 'NONE';

    public function rate(): float
    {
        return match($this) {
            Currency::USD => 31.0,
            Currency::TWD => 1.0,  // Assuming TWD is the base currency
        };
    }

    public static function fromString(string $currencyCode): Currency
    {
        // setup default value instead of throw ValueError exception
        $map = [];
        foreach (self::cases() as $case) {
            $map[$case->value] = $case;
        }

        return $map[$currencyCode] ?? self::NONE;
    }
}
