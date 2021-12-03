<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string("tendangnhap")->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string("sodienthoai")->nullable();
            $table->string("diachi")->nullable();
            $table->string("thenganhang")->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('role');
            $table->timestamp('ngaysinh')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
