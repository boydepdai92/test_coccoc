<?php

namespace Tests\Unit;

use App\Http\Requests\CalculateGrossPriceShippingRequest;
use App\Services\Fee\FeeByDimension;
use App\Services\Fee\FeeByProductType;
use App\Services\Fee\FeeByWeight;
use App\Services\ShippingFeeService;
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

        $shippingService = new ShippingService(new ShippingFeeService(new FeeByWeight(), new FeeByDimension(), new FeeByProductType()));

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

        $options = ['isUseProductType' => true];

        $shippingService = new ShippingService(new ShippingFeeService(new FeeByWeight(), new FeeByDimension(), new FeeByProductType()));

        $expected = 410;

        $this->assertEquals($expected, $shippingService->calculateGrossPrice($calculateRequest, $options));
    }
}
