<?php

namespace App\Services\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;

class Address implements Arrayable
{
    public function __construct(
        private readonly string $city,
        private readonly string $district,
        private readonly string $street
    ) {}


    public function toArray(): array
    {
        return [
            'city' => $this->city,
            'district' => $this->district,
            'street' => $this->street,
        ];
    }
}
