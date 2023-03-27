<?php

namespace Tests\Feature;

use Tests\TestCase;

class CityFeatTest extends TestCase
{
    
    public function test_get_city_list()
    {
        $response = $this->get('api/city/list?uf=RJ&page=1');
        $response->assertStatus(200);
    }

    public function test_get_city_validate_query_string_uf()
    {
        $response = $this->get('api/city/list?uf=RQWJ&page=1');
        $response->assertStatus(302);
    }

    public function test_get_city_validate_query_string_page()
    {
        $response = $this->get('api/city/list?uf=RJ&page=A');
        $response->assertStatus(302);
    }

    public function test_get_city_validate_query_string_invalid()
    {
        $response = $this->get('api/city/list?ufs=RJ&page=A');
        $response->assertStatus(302);
    }
}
