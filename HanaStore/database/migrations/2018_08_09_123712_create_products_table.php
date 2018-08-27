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
            $table->string('name'); // Tên sản phẩm
            $table->unsignedInteger('categoryId'); // ID danh mục
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->unsignedInteger('collectionId'); // ID bộ sưu tập.
            $table->foreign('collectionId')->references('id')->on('collections');
            $table->unsignedInteger('price');// Giá
            $table->string('images'); // Ảnh
            $table->integer('sale')->default(0); // Giá khuyến mãi.
            $table->integer('new')->default(1); // Hàng mới up,  1 = mới up, 0 = up đã lâu.
            $table->string('description'); //Thông tin
            $table->text('detail'); // Thông tin chi tiết.
            $table->timestamps();
            $table->string('status')->default(1); // 1. Còn hàng, 2. Hết hàng
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
