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
            $table->string('id',60);
            $table->primary('id');
            $table->string('customerId');
            $table->decimal('totalPrice');
            $table->string('shipName');
            $table->string('shipEmail');
            $table->string('shipPhone');
            $table->string('shipAddress');
            $table->text('note');
            $table->timestamps();
            $table->integer('status')->default(0); // 0. Đang chờ xác nhận, 1. Đã xác nhận, 2. Hoàn thành
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
