<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Weather;
use App\Services\Interfaces\WeatherServiceInterface;
use Illuminate\Console\Command;
class UpdateWeather extends Command
{
    protected $signature = 'weather:update';
    protected $description = 'Обновить данные о погоде для всех городов';

    protected $weatherService;

    public function __construct(WeatherServiceInterface $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
    }

    public function handle()
    {
        $cities = City::all();

        foreach ($cities as $city) {
            
            $weatherData = $this->weatherService->fetchWeatherData($city->latitude, $city->longitude);

            if ($weatherData === null) {
                $this->error("Не удалось получить данные о погоде для города: {$city->name}");
                continue;
            }

            $temperature = $weatherData['main']['temp'] ?? null;
            $description = $weatherData['weather'][0]['description'] ?? 'Нет данных';

            Weather::updateOrCreate(
                ['city_id' => $city->id],
                ['temperature' => $temperature, 'description' => $description, 'updated_at' => now()]
            );

            $this->info("Данные о погоде для города {$city->name} обновлены: {$temperature}°C, {$description}");
        }

        $this->info('Данные о погоде успешно обновлены.');
    }
}