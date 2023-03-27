<?php
namespace App\DataProviders\Cities;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\DataProviders\Cities\Dto\CityDto;
use Illuminate\Support\Facades\Log;
use Exception;

abstract class CityHandler implements CityProvider
{
    private CityProvider $nexHandler;
    private string $url;

    public function setNext(CityProvider $handler): CityProvider
    {
        $this->nexHandler = $handler;

        return $handler;
    }

    public function handle(string $uf): Collection
    {
        if ($this->nexHandler) {
            return $this->nexHandler->handle($uf);
        }

        return new Collection();
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function doRequest(string $url): Collection
    {
        try {
            $response = Http::get($url);
            if (!$response->successful()) {
                throw new Exception("falha na requisição");
            }
            $data = $response->json();

            return collect($data)
                ->map(function ($city) {
                    return new CityDto(
                        name: $city['nome'],
                        ibge_code: $city['codigo_ibge'] ?? $city['id']
                    );
                });
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            throw new Exception("Falha ao consultar {$url} {$e->getMessage()}");

        }
    }
    
}