<?php

namespace App\DataProviders\Cities;


use Illuminate\Support\Collection;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BrasilCityProvider extends CityHandler
{
    
    public function handle(string $uf): Collection
    {
        if (env('CITIES_PROVIDER') != 'brasilapi') {
            //fim da cadeia de chain responsability, se chegou aqui significa que não foi setado nem ibge e nem brasilapi no .env
            throw new HttpException(500, "Nenhum provider foi encontrado");
        }

        return $this->doRequest(str_replace('{uf}', $uf, config('external-apis.citiesProvider.ibge.base_url')));
    }
}