<?php

namespace App\Providers;

use App\DataProviders\Cities\IbgeCityProvider;
use App\DataProviders\Cities\TestingCityProvider;
use App\DataProviders\Cities\CityProvider;
use App\DataProviders\Cities\BrasilCityProvider;
use Illuminate\Support\ServiceProvider;

class ExternalDataProvidersProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CityProvider::class, function ($app) {
            return match (config('external-apis.citiesProvider')) {
                'ibge' => new IbgeCityProvider(),
                'brasilapi' => new BrasilCityProvider(),
            };
        });
    }
}