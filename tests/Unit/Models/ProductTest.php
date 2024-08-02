<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Review;

class ProductTest extends TestCase
{
    use RefreshDatabase; 

    public function test_product_can_have_many_order_items()
    {
        $product = Product::factory()->create();
        $order_items = OrderItem::factory(3)->create([
            'order_id' => Order::factory()->create(),
            'product_id' => $product->id
        ]);

        foreach ($product->order_items as $orderItem) {
            $this->assertInstanceOf(OrderItem::class, $orderItem);
            $this->assertEquals($orderItem->product_id, $product->id);
        }
    }

    public function test_product_belongs_to_order_through_order_items()
    {
        $product = Product::factory()->create();
        $order_items = OrderItem::factory(3)->create([
            'order_id' => Order::factory()->create(),
            'product_id' => $product->id
        ]);

        foreach ($product->order_items as $orderItem) {
            $this->assertInstanceOf(Order::class, $orderItem->order);
        }
    }
    
    public function test_product_can_have_many_categories()
    {
        $category1 = Category::factory()->create();
        $category2 = Category::factory()->create();

        $product = Product::factory()->create();
        $product->categories()->attach([$category1->id, $category2->id]);

        $this->assertCount(2, $product->categories);
        $this->assertTrue($product->categories->contains($category1));
        $this->assertTrue($product->categories->contains($category2));
    }

    public function test_product_can_have_many_reviews()
    {
        $product = Product::factory()->create();
        $reviews = Review::factory(2)->create([
            'product_id' => $product
        ]);
        
        $this->assertEquals($product->reviews->count(), 2);
    }
}
