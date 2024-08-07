<?php

namespace App\Services;

use App\Exceptions\InvalidOrderException;
use App\Services\Entities\Order;
use App\Services\Enums\Currency;

class CheckOrderFormatService
{
    public function check(Order $order): void
    {
        $this->validateName($order->getName());
        $this->validatePrice($order->getPrice(), $order->getCurrency());
        $this->validateCurrency($order->getCurrency());
    }

    private function validateName(string $name): void
    {
        if (! preg_match('/^[A-Za-z\s]+$/', $name)) {
            throw new InvalidOrderException('Name contains non-English characters');
        }

        if (! preg_match('/^[A-Z]/', $name)) {
            throw new InvalidOrderException('Named is not capitalized');
        }
    }

    private function validatePrice(float $price, Currency $currency): void
    {
        if ($currency === Currency::USD) {
            $price *= Currency::USD->rate();
        }

        $limitTWD = 2000;
        if ($price > $limitTWD) {
            throw new InvalidOrderException("Price is over {$limitTWD}");
        }
    }

    private function validateCurrency(Currency $currency): void
    {
        $validCurrencies = [Currency::TWD, Currency::USD];
        if (! in_array($currency, $validCurrencies)) {
            throw new InvalidOrderException('Currency format is wrong');
        }
    }
}
