<?php

namespace App\DataProviders\Cities\Dto;

class CityDto
{
    public function __construct(
        public string $name,
        public string $ibge_code
    ) {}
}