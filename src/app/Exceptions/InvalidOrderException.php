<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class InvalidOrderException extends HttpResponseException
{
    public function __construct(string $message)
    {
        parent::__construct(
            new JsonResponse(
                ['error' => $message],
                Response::HTTP_BAD_REQUEST
            )
        );
    }
}
