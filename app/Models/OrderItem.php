<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{   
    use HasFactory;

    public function order()
    {
        return $this->belongsTo( Order::class );
    }

    public function product()
    {
        return $this->belongsTo( Product::class );
    }

    public function setItemWeightAttribute($value)
    {
        $this->attributes['item_weight'] = $value;
        if ( isset( $this->attributes['quantity'] ) ) {
            $this->attributes['total_weight'] = $value * $this->attributes['quantity'];
        }
    }

    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = $value;
        if (isset($this->attributes['item_weight'])) {
            $this->attributes['total_weight'] = $this->attributes['weight'] * $value;
        }
    }

}
