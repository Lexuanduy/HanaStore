<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD:HanaStore/database/migrations/2018_08_14_021341_create_order_details_table.php
            $table->unsignedInteger('orderId')->references('id')->on('orders');;
            $table->unsignedInteger('productId')->references('id')->on('products');
=======
            $table->unsignedInteger('orderId');
            $table->foreign('orderId')->references('id')->on('orders');
            $table->unsignedInteger('productId');
            $table->foreign('productId')->references('id')->on('products');
>>>>>>> 1a970b585c84a4d06cd45727800d77832f7a8f92:HanaStore/database/migrations/2018_08_10_124836_create_order_details_table.php
            $table->integer('quantity');
            $table->double('unitPrice');
            $table->string('address');
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
        Schema::dropIfExists('order_details');
    }
}
