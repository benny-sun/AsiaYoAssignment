<?php

namespace Tests\Unit;

use App\Exceptions\InvalidOrderException;
use App\Services\Entities\Order;
use App\Services\OrderCheckers\NameChecker;
use Illuminate\Http\JsonResponse;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class NameCheckerTest extends TestCase
{
    public function test_valid_price(): void
    {
        // arrange
        $stubOrder = $this->createMock(Order::class);
        $stubOrder->method('getName')
            ->willReturn('Benny Sun');

        // act
        $sut = new NameChecker();
        $sut->check($stubOrder);

        // assert
        $this->addToAssertionCount(1);
    }

    #[DataProvider('invalidNames')]
    public function test_invalid_price(string $name, string $expectedMessage): void
    {
        // arrange
        $stubOrder = $this->createMock(Order::class);
        $stubOrder->method('getName')
            ->willReturn($name);

        // assert exception
        $this->expectException(InvalidOrderException::class);

        // act
        try {
            $sut = new NameChecker();
            $sut->check($stubOrder);
        } catch (InvalidOrderException $e) {
            // extract the response and check the message
            $response = $e->getResponse();
            $this->assertInstanceOf(JsonResponse::class, $response);

            // get JSON data as an associative array
            $data = $response->getData(true);
            $this->assertArrayHasKey('error', $data);
            $this->assertEquals($expectedMessage, $data['error']);

            throw $e; // rethrow to satisfy expectException
        }
    }

    public static function invalidNames(): array
    {
        return [
            'contains non-English letters' => [
                '君の名は',
                'Name contains non-English characters'
            ],
            'not start with uppercase alphabet' => [
                'benny sun',
                'Named is not capitalized'
            ]
        ];
    }
}
