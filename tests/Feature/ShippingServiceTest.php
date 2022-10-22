<?php

namespace Tests\Feature;

use App\Http\Requests\CalculateGrossPriceShippingRequest;
use App\Services\ShippingFeeFactory;
use App\Services\ShippingService;
use Tests\TestCase;

class ShippingServiceTest extends TestCase
{
    public function test_calculate_gross_fee()
    {
        $calculateRequest = new CalculateGrossPriceShippingRequest([
            'items' => [
               [
                   'amazon_price' => 10,
                   'width'  => 2,
                   'height' => 3,
                   'depth'  => 4,
                   'weight' => 5,
               ]
            ]
        ]);

        $shippingService = new ShippingService(new ShippingFeeFactory());

        $expected = 274;

        $this->assertEquals($expected, $shippingService->calculateGrossPrice($calculateRequest));
    }

    public function test_calculate_gross_fee_with_product_type()
    {
        $calculateRequest = new CalculateGrossPriceShippingRequest([
            'items' => [
                [
                    'amazon_price' => 10,
                    'width'  => 2,
                    'height' => 3,
                    'depth'  => 4,
                    'weight' => 5,
                ]
            ]
        ]);

        $options = [
            'isUseProductType' => true,
        ];

        $shippingService = new ShippingService(new ShippingFeeFactory());

        $expected = 410;

        $this->assertEquals($expected, $shippingService->calculateGrossPrice($calculateRequest, $options));
    }
}
