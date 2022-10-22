<?php

namespace App\Services;

use App\Services\Fee\FeeByDimension;
use App\Services\Fee\FeeByProductType;
use App\Services\Fee\FeeByWeight;

class ShippingWithProductTypeFeeService extends ShippingFeeService implements ShippingFeeServiceInterface
{
    protected $feeProductType;

    public function __construct(FeeByWeight $feeByWeight, FeeByDimension $feeByDimension, FeeByProductType $feeProductType)
    {
        parent::__construct($feeByWeight, $feeByDimension);
        $this->feeProductType = $feeProductType;
    }

    public function calculate(array $params)
    {
        $parentFee = parent::calculate($params);
        $productTypeFee = $this->feeProductType->calculate($params);

        return max($parentFee, $productTypeFee);
    }
}
