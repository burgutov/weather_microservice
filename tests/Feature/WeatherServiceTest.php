<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\City;
use App\Models\Weather;

class WeatherServiceTest extends TestCase
{
    public function testGetWeather()
    {
        // Создайте тестовый город
        $city = City::factory()->create(['name' => 'Test City', 'latitude' => 40.7128, 'longitude' => -74.0060]);
        Weather::create(['city_id' => $city->id, 'temperature' => 25, 'description' => 'Sunny']);

        // Выполните запрос к вашему API
        $response = $this->getJson('/api/weather/' . $city->id );

        // Проверьте статус и данные
        $response->assertStatus(200)
            ->assertJson([
                'city_id' => $city->id,
                'city_name' => 'Test City',
                'temperature' => 25,
                'description' => 'Sunny',
            ]);
    }
}
