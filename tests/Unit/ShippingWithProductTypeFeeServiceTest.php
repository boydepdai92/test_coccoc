<?php

namespace Tests\Unit;

use App\Services\Fee\FeeByDimension;
use App\Services\Fee\FeeByProductType;
use App\Services\Fee\FeeByWeight;
use App\Services\ShippingWithProductTypeFeeService;
use Tests\TestCase;

class ShippingWithProductTypeFeeServiceTest extends TestCase
{
    public function test_calculate_fee_with_product_type()
    {
        $shippingFee = new ShippingWithProductTypeFeeService(new FeeByWeight(), new FeeByDimension(), new FeeByProductType());

        $expected = 400;

        $this->assertEquals($expected, $shippingFee->calculate([
            'amazon_price' => 10,
            'width'  => 2,
            'height' => 3,
            'depth'  => 4,
            'weight' => 5,
        ]));
    }
}
