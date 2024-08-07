<?php

namespace Tests\Feature\DataProviders;

final class OrderCurrencyTransformDataProvider
{
    public static function provide(): array
    {
        return [
            'currency from request is TWD' => [
                [ // request payload
                    'id' => 'A0000001',
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road',
                    ],
                    'price' => 1950,
                    'currency' => 'TWD',
                ],
                200, // http status code
                // response content
                '{"id":"A0000001","name":"Melody Holiday Inn","address":{"city":"taipei-city","district":"da-an-district","street":"fuxing-south-road"},"price":1950,"currency":"TWD"}',
            ],
            'currency from request is USD' => [
                [
                    'id' => 'A0000001',
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road',
                    ],
                    'price' => 30,
                    'currency' => 'USD',
                ],
                200,
                '{"id":"A0000001","name":"Melody Holiday Inn","address":{"city":"taipei-city","district":"da-an-district","street":"fuxing-south-road"},"price":930,"currency":"TWD"}',
            ],
        ];
    }
}
