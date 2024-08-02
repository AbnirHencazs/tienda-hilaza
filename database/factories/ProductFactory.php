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
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2),
            'weight' => $this->faker->randomFloat(2),
            'stock_quantity' => $this->faker->randomDigit(),
            'sku' => $this->faker->isbn10()
        ];
    }
}
