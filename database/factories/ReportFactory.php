<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    public function definition(): array
    {
        return [
            'number'  => fake()->regexify('[А-Я]\d{3}[А-Я]{2}\d{2,3}'),
            'text' => fake()->realText(50),
            'status_id'   => fake()->numberBetween(1, 4),
            'user_id'     => fake()->numberBetween(1, 5), // Если у вас есть пользователи
            'created_at'  => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
