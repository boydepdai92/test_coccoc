<?php

namespace App\Services\Fee;

use App\Services\Fee\Contracts\FeeByProductTypeInterface;

class FeeByProductType implements FeeByProductTypeInterface
{
    public function calculate(array $params): int
    {
        //TODO: calculate fee for each product type fee. Fee for each product type is provider ?
        return 400;
    }
}
