<?php

namespace App\Providers;

use App\Services\Contracts\ShippingServiceInterface;
use App\Services\Fee\Contracts\FeeByDimensionInterface;
use App\Services\Fee\Contracts\FeeByProductTypeInterface;
use App\Services\Fee\Contracts\FeeByWeightInterface;
use App\Services\Fee\FeeByDimension;
use App\Services\Fee\FeeByProductType;
use App\Services\Fee\FeeByWeight;
use App\Services\ShippingService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ShippingServiceInterface::class, ShippingService::class);
        $this->app->bind(FeeByWeightInterface::class, FeeByWeight::class);
        $this->app->bind(FeeByDimensionInterface::class, FeeByDimension::class);
        $this->app->bind(FeeByProductTypeInterface::class, FeeByProductType::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
