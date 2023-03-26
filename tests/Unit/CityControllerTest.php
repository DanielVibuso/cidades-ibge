<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\CityController;
use PHPUnit\Framework\TestCase;

class CityControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_route_get_cities()
    {
        $cityController = new CityController();
        $this->assertNotNull($cityController->index());
    }
}
