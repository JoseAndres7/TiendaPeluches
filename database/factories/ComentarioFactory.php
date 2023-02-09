<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->text($maxNbChars = 200),
            'valoracion' => $this->faker->numberBetween($min = 0, $max = 5),
            'product_id' => $this->faker->numberBetween($min = 1, $max = 32),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 2),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
}