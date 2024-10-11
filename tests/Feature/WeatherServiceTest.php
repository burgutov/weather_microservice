<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\City;
use App\Models\Weather;

class WeatherServiceTest extends TestCase
{

    public function testGetWeather()
    {
        $city = City::factory()->create(['name' => 'Test City', 'latitude' => 40.7128, 'longitude' => -74.0060]);
        Weather::create(['city_id' => $city->id, 'temperature' => 25, 'description' => 'Sunny']);

        $response = $this->getJson('/api/weather/' . $city->id );

        $response->assertStatus(200)
            ->assertJson([
                'city_id' => $city->id,
                'city_name' => 'Test City',
                'temperature' => 25,
                'description' => 'Sunny',
            ]);
    }
}
