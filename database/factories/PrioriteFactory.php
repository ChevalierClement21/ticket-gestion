<?php

namespace Database\Factories;

use App\Models\Priorite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Priorite>
 */
class PrioriteFactory extends Factory
{
    protected $model = Priorite::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level' => $this->faker->randomElement(['Low', 'Medium', 'High', 'Critical']),
        ];
    }
}
