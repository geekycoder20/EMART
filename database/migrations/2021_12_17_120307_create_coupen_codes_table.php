<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoupenCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupen_codes', function (Blueprint $table) {
            $table->id();
            $table->string('coupen_code');
            $table->enum('coupen_type', ['F', 'P']);
            $table->integer('coupen_value');
            $table->integer('cart_min_value');
            $table->date('expired_on');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupen_codes');
    }
}
