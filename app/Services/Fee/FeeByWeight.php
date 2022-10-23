<?php

namespace App\Services\Fee;

use App\Services\Fee\Contracts\FeeByWeightInterface;

class FeeByWeight implements FeeByWeightInterface
{
    public function calculate(array $params)
    {
        return $params['weight'] * config('coefficient.weight');
    }
}
