<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Product;
use App\Models\Review;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_review_belongs_to_one_product()
    {
        $product = Product::factory()->create();
        $review = Review::factory()->create([
            'product_id' => $product
        ]);

        $this->assertInstanceOf( Product::class, $review->product );
    }
}
