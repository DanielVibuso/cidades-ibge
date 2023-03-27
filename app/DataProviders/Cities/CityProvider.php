<?php

namespace App\DataProviders\Cities;

use Illuminate\Support\Collection;

interface CityProvider
{
    public function handle(string $uf): Collection;

    public function setNext(CityProvider $handler): CityProvider;

}