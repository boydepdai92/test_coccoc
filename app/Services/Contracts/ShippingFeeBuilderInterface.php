<?php

namespace App\Services\Contracts;

interface ShippingFeeBuilderInterface
{
    public function getShippingFee();

    public function addWeightFee($weightFee);

    public function addDimensionFee($dimensionFee);

    public function addProductTypeFee($productTypeFee);
}
