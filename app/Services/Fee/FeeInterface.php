<?php

namespace App\Services\Fee;

interface FeeInterface
{
    public function calculate(array $params);
}
