<?php

namespace App\Services\Interfaces;

interface WeatherServiceInterface
{
    public function fetchWeatherData($latitude, $longitude);
}
