<?php

return [
    'citiesProvider' => [
    'ibge' => [
        'base_url' => 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/{uf}/municipios',
    ],
    'brasilapi' => [
        'base_url' => 'https://brasilapi.com.br/api/ibge/municipios/v1/{uf}',
    ]
],
];