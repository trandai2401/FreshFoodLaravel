<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Itemgiohang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('itemgiohang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_giohang');
            $table->unsignedBigInteger('id_nongsan');
            $table->integer('soluong');
            $table->foreign('id_giohang')->references('id')->on('giohang');
            $table->foreign('id_nongsan')->references('id')->on('nongsan');
            $table->primary(array('id_giohang', 'id_nongsan'));
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
        Schema::dropIfExists('itemgiohang');
        //
    }
}
