<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=> 1,
            'category_id'=>$this->faker->randomElement([3,5,7,8,10,11]),
            'name'=>$this->faker->name(),
            'price'=>$this->faker->randomElement([10,20,30]),
            'stock'=>$this->faker->randomElement([100,200,300]),
        ];
    }
}
