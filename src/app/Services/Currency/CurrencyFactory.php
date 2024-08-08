<?php

namespace App\Services\Currency;

class CurrencyFactory
{
    public static function create(string $currencyCode): Currency
    {
        $className = __NAMESPACE__ . '\\' . strtoupper($currencyCode);

        if (! class_exists($className)) {
            return new NONE();
        }

        return new $className;
    }
}
