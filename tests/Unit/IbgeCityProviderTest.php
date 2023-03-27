<?php

namespace Tests\Unit;

use App\DataProviders\Cities\CityProvider;
use App\DataProviders\Cities\Dto\CityDto;
use App\DataProviders\Cities\IbgeCityProvider;
use Exception;
use Tests\TestCase;

class IbgeCityProviderTest extends TestCase
{
    public function teste_provider_from_interface()
    {
        $ibgeProvider = new IbgeCityProvider();
        $this->assertInstanceOf(CityProvider::class, $ibgeProvider);
    }

    public function test_handle_not_null()
    {
        $ibgeProvider = new IbgeCityProvider();
        $uf = "RJ";
        $this->assertNotNull($ibgeProvider->handle($uf));
    }

    public function test_handle_is_json()
    {
        $ibgeProvider = new IbgeCityProvider();
        $uf = "RJ";
        $this->assertJson($ibgeProvider->handle($uf));
    }

    public function test_handle_exception_treatment()
    {
        $this->expectException(Exception::class);
        $ibgeProvider = new IbgeCityProvider();
        $uf = "R/J";
        $ibgeProvider->handle($uf);
    }

    public function test_handle_contains_city()
    {
        $ibgeProvider = new IbgeCityProvider();
        $uf = "RJ";
        $this->assertContainsEquals(new CityDto("Volta Redonda", "3306305"), $ibgeProvider->handle($uf));
    }
}
