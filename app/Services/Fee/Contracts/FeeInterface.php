<?php

namespace App\Services\Fee\Contracts;

interface FeeInterface
{
    public function calculate(array $params);
}
