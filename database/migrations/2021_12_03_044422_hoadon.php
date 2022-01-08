<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_trangthai');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_trangthai')->references('id')->on('trangthai');
            $table->BigInteger('tongtien')->nullable();
            $table->String('diachi')->nullable();
            $table->BigInteger('tienship')->nullable();
            $table->string('sodienthoai')->nullable();
            $table->string('nguoinhan')->nullable();
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
        //
        Schema::dropIfExists('hoadon');
    }
}
