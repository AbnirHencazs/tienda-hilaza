<?php

namespace Tests\Unit\Models;

//Switch from PHPUnit, otherwise faker won't work
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_can_belong_to_user()
    {
        $order = Order::factory()->create([
            'user_id' => User::factory()->create()
        ]);

        $this->assertInstanceOf( User::class, $order->user );
    }

    public function test_order_can_belong_to_guest()
    {
        $order = Order::factory()->create();

        $this->assertInstanceOf( Order::class, $order );
        $this->assertNull( $order->user_id );
    }
    
    public function test_order_has_many_order_items()
    {
        $order = Order::factory()->create();
        $order_items = OrderItem::factory(3)->create([
            'order_id' => $order,
            'product_id' => Product::factory()->create()
        ]);

        foreach($order->order_items as $orderItem) {
            $this->assertInstanceOf( OrderItem::class, $orderItem );
            $this->assertEquals( $orderItem->order_id, $order->id );
        }
    }

    public function test_order_has_many_products_through_order_items()
    {
        $order = Order::factory()->create();
        $order_items = OrderItem::factory(3)->create([
            'order_id' => $order,
            'product_id' => Product::factory()->create()
        ]);

        foreach($order->order_items as $orderItem) {
            $this->assertInstanceOf( Product::class, $orderItem->product );
        }
    }
}
