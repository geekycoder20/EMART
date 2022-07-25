<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory()->create();
        \App\Models\OrderStatus::create(['order_status'=>'Pending']);
        \App\Models\OrderStatus::create(['order_status'=>'Packed']);
        \App\Models\OrderStatus::create(['order_status'=>'Shipped']);
        \App\Models\OrderStatus::create(['order_status'=>'Delivered']);
        \App\Models\OrderStatus::create(['order_status'=>'Cancelled']);
    }
}
