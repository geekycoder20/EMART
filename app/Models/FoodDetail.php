<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDetail extends Model
{
    use HasFactory;

    public function food()
    {
        return $this->belongsTo(Food::class,"food_id","id");
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class,"id","food_details_id");
    }
}
