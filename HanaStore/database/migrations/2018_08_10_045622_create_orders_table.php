<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customerId');
            $table->foreign('customerId')->references('id')->on('customers');
            $table->double('totalPrice');
            $table->timestamps();
            $table->integer('status')->default(1); // 0. Đang chờ xác nhận, 1. Đã xác nhận, 2. Hoàn thành
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
