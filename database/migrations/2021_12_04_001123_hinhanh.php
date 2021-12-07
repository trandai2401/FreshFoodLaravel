<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hinhanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hinhanh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_nongsan');
            $table->text('src');

            $table->foreign('id_nongsan')->references('id')->on('nongsan');

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
        Schema::dropIfExists('hinhanh');
    }
}
