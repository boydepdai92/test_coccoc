<?php

namespace App\Services\Contracts;

interface ShippingFeeServiceInterface
{
    public function calculate(array $params, array $options);
}
