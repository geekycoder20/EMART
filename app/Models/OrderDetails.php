<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table="order_details";

    public function orderfood(){
    	return $this->hasOne(Food::class,"id","food_id");
    }
}
