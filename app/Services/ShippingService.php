<?php

namespace App\Services;

use App\Http\Requests\CalculateGrossPriceShippingRequest;
use App\Services\Contracts\ShippingFeeServiceInterface;
use App\Services\Contracts\ShippingServiceInterface;

class ShippingService implements ShippingServiceInterface
{
    protected $shippingFeeFactory;

    public function __construct(ShippingFeeFactory $shippingFeeFactory)
    {
        $this->shippingFeeFactory = $shippingFeeFactory;
    }

    public function calculateGrossPrice(CalculateGrossPriceShippingRequest $request, array $options = [])
    {
        $items = $request->input('items');
        $grossPrice = 0;

        foreach ($items as $item) {
            $shippingFee = $this->calculateFee($item, $options);
            $itemPrice = $item['amazon_price'] + $shippingFee;
            $grossPrice += $itemPrice;
        }

        return $grossPrice;
    }

    protected function calculateFee(array $item, array $options)
    {
        $classShippingFee = $this->getClassShippingFree($options);

        return $classShippingFee->calculate($item);
    }

    protected function getClassShippingFree(array $options): ShippingFeeServiceInterface
    {
        if (isset($options['isUseProductType']) && true === $options['isUseProductType']) {
            return $this->shippingFeeFactory->getShippingFee(ShippingFeeFactory::TYPE_WITH_PRODUCT_TYPE);
        }

        return $this->shippingFeeFactory->getShippingFee(ShippingFeeFactory::TYPE_DEFAULT);
    }
}
