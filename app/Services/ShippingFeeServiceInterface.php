<?php

namespace App\Services;

interface ShippingFeeServiceInterface
{
    public function calculate(array $params);
}
