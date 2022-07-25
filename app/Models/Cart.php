<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";

    public function food_details(){
    	return $this->hasOne(FoodDetail::class,"id","food_details_id");
    }

    public function foods(){
    	return $this->hasMany(Food::class,"id","food_id");
    }
}
