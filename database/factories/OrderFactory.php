<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_email' => $this->faker->unique->safeEmail(),
            'customer_name' => $this->faker->name(),
            'billing_address' => $this->faker->address(),
            'shipping_address' => $this->faker->address(),
            'total_amount' => $this->faker->randomFloat(2),
            'subtotal' => $this->faker->randomFloat(2),
            'tax_amount' => $this->faker->randomFloat(2),
            'shipping_amount' => $this->faker->randomFloat(2),
            'discount_amount' => $this->faker->randomFloat(2),
            'payment_method' => $this->faker->randomElement(['credit_card', 'debit_card']),
            'shipping_method' => $this->faker->randomElement(['UPS', 'Fedex', 'EstafOta']),
        ];
    }
}
