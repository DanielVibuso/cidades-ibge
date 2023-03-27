<?php 

namespace App\Services;

use App\DataProviders\Cities\CityProvider;
use App\Helpers\DataProvidersHelper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CityService
{
    protected $citiesProvider;

    public function __construct(CityProvider $citiesProvider){
        $this->citiesProvider = $citiesProvider;
    }

    public function getCities(string $uf, $page)
    {   
        try{
            $cities = Cache::remember(env('CITIES_PROVIDER') . $uf, 86400, function() use ($uf) {
                            return $this->citiesProvider->handle($uf);
                        });

            $list = DataProvidersHelper::paginateResponse(
                items: $cities,
                perPage: 10,
                page: $page,
                itemOptions: ['path'=>"localhost:8001/api/city/list?UF=$uf"],
            );
            
            return $list;
        }catch(HttpException $e){
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            throw new HttpException(500, "Falha no processamento dos dados");
        }

    }
}