<?php
namespace App\Swagger;

/**
 * @OA\Schema(
 *     schema="Weather",
 *     type="object",
 *     @OA\Property(property="city_id", type="integer", example=1),
 *     @OA\Property(property="city_name", type="string", example="Москва"),
 *     @OA\Property(property="temperature", type="number", format="float", example=25.5),
 *     @OA\Property(property="description", type="string", example="Солнечно"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-09T11:22:56"),
 * )
 */
