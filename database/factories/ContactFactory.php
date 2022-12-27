<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $aux = $this->faker->numberBetween(1,3);

        if ($aux == 1) {
            return [
                'client_id' => $this-> faker-> numberBetween(1,10),
                'value' => $this -> faker->email(),
                'type' => 'email'
            ];
        } else 
        if ($aux == 2) {
            return [
                'client_id' => $this-> faker-> numberBetween(1,10),
                'value' => $this-> faker->phoneNumber(),
                'type' => 'phoneNumber',
            ];
        } else {
            return [
                'client_id' => $this-> faker-> numberBetween(1,10),
                'value' => $this->faker->address(),
                'type' => 'address',
            ];
        }     
    }
}
