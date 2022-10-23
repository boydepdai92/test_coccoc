<?php

namespace App\Services\Contracts;

use App\Http\Requests\CalculateGrossPriceShippingRequest;

interface ShippingServiceInterface
{
    public function calculateGrossPrice(CalculateGrossPriceShippingRequest $request, array $options = []);
}
