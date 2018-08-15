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
            $table->string('name');
            $table->unsignedInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->unsignedInteger('collectionId');
            $table->foreign('collectionId')->references('id')->on('collections');
            $table->double('price');
            $table->string('images');
            $table->unsignedInteger('sale');
            $table->string('description');
            $table->text('detail');
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
