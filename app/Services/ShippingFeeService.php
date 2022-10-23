<?php

namespace App\Services;

use App\Services\Contracts\ShippingFeeServiceInterface;
use App\Services\Fee\Contracts\FeeByDimensionInterface;
use App\Services\Fee\Contracts\FeeByWeightInterface;

class ShippingFeeService implements ShippingFeeServiceInterface
{
    protected $feeByWeight;
    protected $feeByDimension;

    public function __construct(FeeByWeightInterface $feeByWeight, FeeByDimensionInterface $feeByDimension)
    {
        $this->feeByDimension = $feeByDimension;
        $this->feeByWeight = $feeByWeight;
    }

    public function calculate(array $params)
    {
        $feeWeight    = $this->feeByWeight->calculate($params);
        $feeDimension = $this->feeByDimension->calculate($params);

        return max($feeWeight, $feeDimension);
    }
}
