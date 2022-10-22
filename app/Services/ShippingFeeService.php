<?php

namespace App\Services;

use App\Services\Fee\FeeByDimension;
use App\Services\Fee\FeeByWeight;
use Illuminate\Support\Facades\Log;

class ShippingFeeService implements ShippingFeeServiceInterface
{
    protected $feeByWeight;
    protected $feeByDimension;

    public function __construct(FeeByWeight $feeByWeight, FeeByDimension $feeByDimension)
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
