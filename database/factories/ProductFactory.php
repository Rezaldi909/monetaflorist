<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'harga' => $this->faker->randomNumber(5, true),
            'users_id' => 1,
            'event_type_id' => mt_rand(1, 3),
            'flower_type_id' => mt_rand(1, 6),
            'product_type_id' => mt_rand(1, 5),

        ];
    }
}
