<?php

namespace Tests\Feature\DataProviders;

final class OrderFormatCheckingDataProvider
{
    public static function provide(): array
    {
        return [
            'name include non-English characters' => [
                [ // request payload
                    'id' => 'A0000001',
                    'name' => '君の名は',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road',
                    ],
                    'price' => 1950,
                    'currency' => 'TWD',
                ],
                400, // http status code
                // response content
                '{"error":"Name contains non-English characters"}',
            ],
            'name begin without uppercase letter' => [
                [
                    'id' => 'A0000001',
                    'name' => 'benny sun',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road',
                    ],
                    'price' => 1950,
                    'currency' => 'TWD',
                ],
                400,
                '{"error":"Named is not capitalized"}',
            ],
            'order price over limit' => [
                [
                    'id' => 'A0000001',
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road',
                    ],
                    'price' => 2050,
                    'currency' => 'TWD',
                ],
                400,
                '{"error":"Price is over 2000"}',
            ],
            'currency format is wrong' => [
                [
                    'id' => 'A0000001',
                    'name' => 'Melody Holiday Inn',
                    'address' => [
                        'city' => 'taipei-city',
                        'district' => 'da-an-district',
                        'street' => 'fuxing-south-road',
                    ],
                    'price' => 1950,
                    'currency' => 'JPY',
                ],
                400,
                '{"error":"Currency format is wrong"}',
            ],
        ];
    }
}
