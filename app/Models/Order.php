<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function order_details(){
    	return $this->hasMany(OrderDetails::class,"order_id","id");
    }
    public function orderstatus(){
    	return $this->hasOne(OrderStatus::class,"id","order_status");
    }

    public function delivery_boy(){
    	return $this->hasOne(DeliveryBoy::class,"id","delivery_boy_id");
    }
}
