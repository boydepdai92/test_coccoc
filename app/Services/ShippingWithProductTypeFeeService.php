<?php

namespace App\Services;

use App\Services\Contracts\ShippingFeeServiceInterface;
use App\Services\Fee\Contracts\FeeByDimensionInterface;
use App\Services\Fee\Contracts\FeeByProductTypeInterface;
use App\Services\Fee\Contracts\FeeByWeightInterface;

class ShippingWithProductTypeFeeService extends ShippingFeeService implements ShippingFeeServiceInterface
{
    protected $feeProductType;

    public function __construct(FeeByWeightInterface $feeByWeight, FeeByDimensionInterface $feeByDimension, FeeByProductTypeInterface $feeProductType)
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
