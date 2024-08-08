<?php

namespace App\Services\Entities;

use App\Services\Currency\Currency;
use App\Services\ValueObjects\Address;
use Illuminate\Contracts\Support\Arrayable;

class Order implements Arrayable
{
    public function __construct(
        private string  $id,
        private string  $name,
        private Address $address,
        private float   $price,
        private Currency  $currency
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address->toArray(),
            'price' => $this->price,
            'currency' => $this->currency->code(),
        ];
    }
}
