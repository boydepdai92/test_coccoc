<?php

namespace App\Services;

use App\Services\Contracts\ShippingFeeServiceInterface;

class ShippingFeeFactory
{
    const TYPE_DEFAULT = 'default';
    const TYPE_WITH_PRODUCT_TYPE = 'with_product_type';

    public function getShippingFee(string $type): ShippingFeeServiceInterface
    {
        switch ($type) {
            case self::TYPE_WITH_PRODUCT_TYPE:
                return app(ShippingWithProductTypeFeeService::class);
            default:
                return app(ShippingFeeService::class);
        }
    }
}
