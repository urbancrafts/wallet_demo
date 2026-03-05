<?php
namespace App\AppServices;

class CoinGeckoService
{
    public function getRate(string $currency): float
    {
        $response = Http::get(
            'https://api.coingecko.com/api/v3/simple/price',
            [
                'ids' => strtolower($currency),
                'vs_currencies' => 'ngn'
            ]
        );

        return $response->json()[
            strtolower($currency)
        ]['ngn'];
    }
}
