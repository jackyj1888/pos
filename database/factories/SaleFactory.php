<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'client_id' => $this->faker->numberBetween(1,10),
            'invoice_number' => $this->faker->unique()->numberBetween(100,200),
            'nit' => $this->faker->regexify('[0-9]{8}[0-0][1-1][1-9]'),
            'name' => $this->faker->name(),
            'sale_date' => $this->faker->date(),
        ];
    }
}