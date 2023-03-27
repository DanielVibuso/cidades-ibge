<?php

namespace App\DataProviders\Cities;

use Exception;
use Illuminate\Support\Collection;

class IbgeCityProvider extends CityHandler
{
    public function handle(string $uf): Collection
    {
        //chain of responsibility. ibge -> brasil
        if (env('CITIES_PROVIDER') != 'ibge') {
            $this->setNext(new BrasilCityProvider());
            return parent::handle($uf);
        }
        return $this->doRequest(str_replace('{uf}', $uf, config('external-apis.citiesProvider.ibge.base_url')));
    }
}