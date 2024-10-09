<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cities = [
            ['name' => 'New York', 'latitude' => 40.7128, 'longitude' => -74.0060],
            ['name' => 'Los Angeles', 'latitude' => 34.0522, 'longitude' => -118.2437],
            ['name' => 'Chicago', 'latitude' => 41.8781, 'longitude' => -87.6298],
            ['name' => 'Houston', 'latitude' => 29.7604, 'longitude' => -95.3698],
            ['name' => 'Phoenix', 'latitude' => 33.4484, 'longitude' => -112.0740],
            ['name' => 'Philadelphia', 'latitude' => 39.9526, 'longitude' => -75.1652],
            ['name' => 'San Antonio', 'latitude' => 29.4241, 'longitude' => -98.4936],
            ['name' => 'San Diego', 'latitude' => 32.7157, 'longitude' => -117.1611],
            ['name' => 'Dallas', 'latitude' => 32.7767, 'longitude' => -96.7970],
            ['name' => 'San Jose', 'latitude' => 37.3382, 'longitude' => -121.8863],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
