<?php

namespace App\Services;

use App\Services\Contracts\ShippingFeeBuilderInterface;
use App\Services\Fee\ShippingFee;

class ShippingFeeBuilder implements ShippingFeeBuilderInterface
{
    private $shippingFee;

    public function __construct()
    {
        $this->shippingFee = new ShippingFee();
    }

    public function getShippingFee(): ShippingFee
    {
        return $this->shippingFee;
    }

    public function addWeightFee($weightFee)
    {
        $this->shippingFee->weightFee = $weightFee;
    }

    public function addDimensionFee($dimensionFee)
    {
        $this->shippingFee->dimensionFee =$dimensionFee;
    }

    public function addProductTypeFee($productTypeFee)
    {
        $this->shippingFee->productTypeFee =$productTypeFee;
    }
}
