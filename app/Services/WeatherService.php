<?php

namespace App\Services;

use App\Services\Interfaces\WeatherServiceInterface; // Импортируйте интерфейс
use Illuminate\Support\Facades\Http;

class WeatherService implements WeatherServiceInterface
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function fetchWeatherData($latitude, $longitude)
    {
        $url = "http://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&appid={$this->apiKey}&units=metric";

        $response = Http::get($url);
        
        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
