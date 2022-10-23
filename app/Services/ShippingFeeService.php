<?php

namespace App\Services;

use App\Services\Contracts\ShippingFeeServiceInterface;
use App\Services\Fee\Contracts\FeeByDimensionInterface;
use App\Services\Fee\Contracts\FeeByProductTypeInterface;
use App\Services\Fee\Contracts\FeeByWeightInterface;

class ShippingFeeService implements ShippingFeeServiceInterface
{
    protected $feeByWeight;
    protected $feeByDimension;
    protected $feeProductType;

    public function __construct(FeeByWeightInterface $feeByWeight, FeeByDimensionInterface $feeByDimension, FeeByProductTypeInterface $feeProductType)
    {
        $this->feeByDimension = $feeByDimension;
        $this->feeByWeight = $feeByWeight;
        $this->feeProductType = $feeProductType;
    }

    public function calculate(array $params, array $options)
    {
        $builder = new ShippingFeeBuilder();
        $builder->addWeightFee($this->feeByWeight->calculate($params));
        $builder->addDimensionFee($this->feeByDimension->calculate($params));

        if (isset($options['isUseProductType']) && $options['isUseProductType']) {
            $builder->addProductTypeFee($this->feeProductType->calculate($params));
        }

        $shippingFee = $builder->getShippingFee();

        return max($shippingFee->weightFee, $shippingFee->dimensionFee, $shippingFee->productTypeFee);
    }
}
