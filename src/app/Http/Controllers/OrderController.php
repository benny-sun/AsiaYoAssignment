<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderTransformRequest;
use App\Services\Entities\Order;
use App\Services\Enums\Currency;
use App\Services\TransformOrderService;
use App\Services\ValueObjects\Address;
use Illuminate\Http\Response;

class OrderController extends Controller
{

    public function __construct(private readonly TransformOrderService $orderTransformService) {}

    public function transformOrder(OrderTransformRequest $request): Response
    {
        $order = $this->convertPayloadToEntity($request);
        $transformedOrder = $this->orderTransformService->transform($order);

        return response($transformedOrder);
    }

    private function convertPayloadToEntity(OrderTransformRequest $request): Order
    {
        return new Order(
            id: $request->input('id'),
            name: $request->input('name'),
            address: new Address(
                city: $request->input('address.city'),
                district: $request->input('address.district'),
                street: $request->input('address.street')
            ),
            price: (float) $request->input('price'),
            currency: Currency::fromString($request->input('currency')),
        );
    }
}
