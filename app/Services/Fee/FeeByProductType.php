<?php

namespace App\Services\Fee;

class FeeByProductType implements FeeInterface
{
    public function calculate(array $params): int
    {
        //TODO: calculate fee for each product type fee. Fee for each product type is provider ?
        return 400;
    }
}
