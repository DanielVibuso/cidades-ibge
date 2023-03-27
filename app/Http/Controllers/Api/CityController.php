<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityListRequest;
use App\Services\CityService;
use App\DataProviders\Cities\IbgeCityProvider;

class CityController extends Controller
{
    public function index(CityListRequest $request)
    {
        $cityService = new CityService(new IbgeCityProvider());
        return $cityService->getCities($request->uf, $request->page);
    }

}
