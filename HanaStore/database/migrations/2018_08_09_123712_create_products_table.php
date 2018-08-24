<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->unsignedInteger('collectionId');
            $table->foreign('collectionId')->references('id')->on('collections');
            $table->string('name', 50);
            $table->string('images');
            $table->integer('price');
            $table->integer('discount');
            $table->string('description', 250);
            $table->text('detail');
            $table->integer('colors'); // 1. red | 2.yellow | 3.green | 4.blue | 5.white | 6.black
            $table->integer('sizes'); // 1. XS | 2.S | 3.M | 4.L | 5.XL | 6.XXL
            $table->timestamps();
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
