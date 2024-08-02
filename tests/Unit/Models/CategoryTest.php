<?php

namespace Tests\Unit\Models;

//Switch from PHPUnit, otherwise faker won't work
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Category;
use App\Models\Product;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_category_can_have_many_products()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        $category->products()->attach($product);

        $this->assertCount(1, $category->products);
        $this->assertTrue($category->products->contains($product));
    }
}
