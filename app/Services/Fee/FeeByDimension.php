<?php

namespace App\Services\Fee;

use App\Services\Fee\Contracts\FeeByDimensionInterface;

class FeeByDimension implements FeeByDimensionInterface
{
    public function calculate(array $params)
    {
        return $params['width'] * $params['height'] * $params['depth'] * config('coefficient.dimension');
    }
}
