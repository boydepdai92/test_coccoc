<?php

namespace App\Services\Fee;

class FeeByWeight implements FeeInterface
{
    public function calculate(array $params)
    {
        return $params['weight'] * config('coefficient.weight');
    }
}
