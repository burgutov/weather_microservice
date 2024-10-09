<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;


/**
 * @OA\Components(
 *     @OA\Schema(
 *         schema="Weather",
 *         type="object",
 *         @OA\Property(property="city_id", type="integer", example=1),
 *         @OA\Property(property="city_name", type="string", example="Москва"),
 *         @OA\Property(property="temperature", type="number", format="float", example=25.5),
 *         @OA\Property(property="description", type="string", example="Солнечно"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-09T11:22:56"),
 *     )
 * )
 */

class WeatherController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/cities/{id}/weather",
     *     summary="Получить данные о погоде для города",
     *     tags={"Weather"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID города",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(ref="#/components/schemas/Weather")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Данные о погоде не найдены"
     *     )
     * )
     */
    public function getWeather($id)
    {
        $weather = Weather::with('city')->where('city_id', $id)->first();

        if (!$weather) {
            return response()->json(['error' => 'Weather data not found'], 404);
        }

        return response()->json([
            'city_id' => $weather->city_id,
            'city_name' => $weather->city->name, // Используем связь для получения имени города
            'temperature' => $weather->temperature,
            'description' => $weather->description,
            'updated_at' => $weather->updated_at,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
