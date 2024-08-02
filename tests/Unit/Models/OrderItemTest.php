<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_order_item_belongs_to_order_and_product()
    {
        $order_item = OrderItem::factory()->create([
            'order_id' => Order::factory()->create(),
            'product_id' => Product::factory()->create(),
        ]);

        $this->assertInstanceOf( Order::class, $order_item->order );
        $this->assertInstanceOf( Product::class, $order_item->product );
    }

    public function test_weight_attribute_mutator_sets_total_weight()
    {
        $expectedWeight = $this->faker->randomFloat(2);
        $expectedQuantity = $this->faker->randomDigit();
        $expectedTotalWeight = $expectedQuantity * $expectedWeight;

        $order_item = OrderItem::factory()->create([
            'order_id' => Order::factory()->create(),
            'product_id' => Product::factory()->create(),
            'quantity' => $expectedQuantity,
            'item_weight' => $expectedWeight,
        ]);

        $this->assertEquals($expectedTotalWeight, $order_item->total_weight);
    }

    public function test_quantity_attribute_mutator_sets_total_weight()
    {
        $expectedWeight = $this->faker->randomFloat(2);
        $expectedQuantity = $this->faker->randomDigit();
        $expectedTotalWeight = $expectedQuantity * $expectedWeight;

        $order_item = OrderItem::factory()->create([
            'order_id' => Order::factory()->create(),
            'product_id' => Product::factory()->create(),
            'item_weight' => $expectedWeight,
            'quantity' => $expectedQuantity,
        ]);

        $this->assertEquals($expectedTotalWeight, $order_item->total_weight);
    }
}
