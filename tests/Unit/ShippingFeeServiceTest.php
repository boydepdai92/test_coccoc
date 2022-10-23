<?php

namespace Tests\Unit;

use App\Services\Fee\FeeByDimension;
use App\Services\Fee\FeeByProductType;
use App\Services\Fee\FeeByWeight;
use App\Services\ShippingFeeService;
use App\Services\ShippingService;
use Tests\TestCase;

class ShippingFeeServiceTest extends TestCase
{
    public function test_calculate_fee()
    {
        $shippingFee = new ShippingFeeService(new FeeByWeight(), new FeeByDimension(), new FeeByProductType());

        $expected = 264;

        $this->assertEquals($expected, $shippingFee->calculate([
            'amazon_price' => 10,
            'width'  => 2,
            'height' => 3,
            'depth'  => 4,
            'weight' => 5,
        ], []));
    }


    public function test_calculate_fee_with_option()
    {
        $options = ['isUseProductType' => true];

        $shippingFee = new ShippingFeeService(new FeeByWeight(), new FeeByDimension(), new FeeByProductType());

        $expected = 400;

        $this->assertEquals($expected, $shippingFee->calculate([
            'amazon_price' => 10,
            'width'  => 2,
            'height' => 3,
            'depth'  => 4,
            'weight' => 5,
        ], $options));
    }
}
