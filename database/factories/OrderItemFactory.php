<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->word(),
            'quantity' => $this->faker->randomDigit(),
            'price' => $this->faker->randomFloat(2),
            'subtotal' => $this->faker->randomFloat(2),
        ];
    }
}
