<?php

namespace Tests\Feature;

use App\Services\Fee\FeeByDimension;
use App\Services\Fee\FeeByWeight;
use App\Services\ShippingFeeService;
use Tests\TestCase;

class ShippingFeeServiceTest extends TestCase
{
    public function test_calculate_fee()
    {
        $shippingFee = new ShippingFeeService(new FeeByWeight(), new FeeByDimension());

        $expected = 264;

        $this->assertEquals($expected, $shippingFee->calculate([
            'amazon_price' => 10,
            'width'  => 2,
            'height' => 3,
            'depth'  => 4,
            'weight' => 5,
        ]));
    }
}
