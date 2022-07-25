<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
    protected $table = "wishlists";
    public function food(){
    	return $this->hasOne(Food::class,"id","food_id");
    }
}
