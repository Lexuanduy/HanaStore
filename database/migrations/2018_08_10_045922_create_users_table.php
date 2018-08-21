<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar');
            $table->string('email');
            $table->integer('phone');
            $table->integer('gender')->default(0);//0. Khác, 1. Nam, 2. Nữ
            $table->date('birthDay');
            $table->string('addressDetail'); // Địa chỉ chi tiết.
            $table->string('city'); // Thành phố.
            $table->string('county'); // Quận, huyện.
            $table->string('ward'); // Phường, xã.
            $table->integer('level')->default(0);
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
        Schema::dropIfExists('users');
    }
}
