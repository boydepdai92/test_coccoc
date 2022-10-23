<?php

namespace App\Services;

use App\Http\Requests\CalculateGrossPriceShippingRequest;
use App\Services\Contracts\ShippingFeeServiceInterface;
use App\Services\Contracts\ShippingServiceInterface;

class ShippingService implements ShippingServiceInterface
{
    protected $shippingFeeService;

    public function __construct(ShippingFeeServiceInterface $shippingFeeService)
    {
        $this->shippingFeeService = $shippingFeeService;
    }

    public function calculateGrossPrice(CalculateGrossPriceShippingRequest $request, array $options = [])
    {
        $items = $request->input('items');
        $grossPrice = 0;

        foreach ($items as $item) {
            $shippingFee = $this->calculateFee($item, $options);
            $itemPrice = $item['amazon_price'] + $shippingFee;
            $grossPrice += $itemPrice;
        }

        return $grossPrice;
    }

    protected function calculateFee(array $item, array $options)
    {
        return $this->shippingFeeService->calculate($item, $options);
    }
}
