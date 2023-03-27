<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\CityController;
use App\Http\Requests\CityListRequest;
use Tests\TestCase;
use Mockery\MockInterface;

class CityControllerTest extends TestCase
{
    public function test_route_index()
    {
        $cityController = new CityController();
        $request = new CityListRequest(['uf' => "RJ", "page"=> 1]);
        $this->assertNotNull($cityController->index($request));
    }
}
