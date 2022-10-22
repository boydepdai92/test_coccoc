<?php

namespace App\Services\Fee;

class FeeByDimension implements FeeInterface
{
    public function calculate(array $params)
    {
        return $params['width'] * $params['height'] * $params['depth'] * config('coefficient.dimension');
    }
}
