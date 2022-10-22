<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateGrossPriceShippingRequest;
use App\Services\ShippingServiceInterface;
use Illuminate\Http\JsonResponse;

class ShippingController extends Controller
{
    protected $shippingService;

    public function __construct(ShippingServiceInterface $shippingService)
    {
        $this->shippingService = $shippingService;
    }

    public function calculateGrossPrice(CalculateGrossPriceShippingRequest $request): JsonResponse
    {
        $grossPrice = $this->shippingService->calculateGrossPrice($request);

        return response()->json(['grossPrice' => $grossPrice]);
    }
}
