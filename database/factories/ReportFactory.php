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
            'number'  => fake()->regexify('aaa-###'),
            'text' => fake()->realText(50),
            'status_id'   => fake()->numberBetween(1, 4),
            'created_at'  => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
