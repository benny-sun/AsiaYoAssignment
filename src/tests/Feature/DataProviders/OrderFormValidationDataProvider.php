<?php

namespace Tests\Feature\DataProviders;
final class OrderFormValidationDataProvider
{
    public static function provide(): array
    {
        return [
            'missing id' => [
                [ // request payload
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road',
                    ],
                    'price' => 60,
                    'currency' => 'USD',
                ],
                422, // http status code
            ],
            'missing price' => [
                [
                    'id' => 'A0000001',
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road',
                    ],
                    'currency' => 'USD',
                ],
                422,
            ],
            'invalid price' => [
                [
                    'id' => 'A0000001',
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road',
                    ],
                    'price' => -1,
                    'currency' => 'USD',
                ],
                422,
            ],
            'missing currency' => [
                [
                    'id' => 'A0000001',
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road'
                    ],
                    'price' => 60,
                ],
                422,
            ],
        ];
    }
}
