<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use Tests\Feature\DataProviders\OrderCurrencyTransformDataProvider;
use Tests\Feature\DataProviders\OrderFormatCheckingDataProvider;
use Tests\Feature\DataProviders\OrderFormValidationDataProvider;
use Tests\TestCase;

class OrderTest extends TestCase
{
    #[DataProviderExternal(OrderFormValidationDataProvider::class, 'provide')]
    public function test_form_validation(array $payload, int $expectedStatusCode): void
    {
        $response = $this->postJson('/api/orders', $payload);
        $response->assertStatus($expectedStatusCode);
    }

    #[DataProviderExternal(OrderFormatCheckingDataProvider::class, 'provide')]
    public function test_format_checking(array $payload, int $expectedStatusCode, string $expectedResponseContent): void
    {
        $response = $this->postJson('/api/orders', $payload);
        $response->assertStatus($expectedStatusCode);
        $response->assertContent($expectedResponseContent);
    }

    #[DataProviderExternal(OrderCurrencyTransformDataProvider::class, 'provide')]
    public function test_currency_transforming(array $payload, int $expectedStatusCode, string $expectedResponseContent)
    {
        $response = $this->postJson('/api/orders', $payload);
        $response->assertStatus($expectedStatusCode);
        $response->assertContent($expectedResponseContent);
    }
}
