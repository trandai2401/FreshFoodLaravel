<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Itemhoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemhoadon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hoadon');
            $table->unsignedBigInteger('id_nongsan');
            $table->integer('soluong');
            $table->bigInteger('dongia');
            $table->foreign('id_hoadon')->references('id')->on('hoadon')->onDelete('cascade');
            $table->foreign('id_nongsan')->references('id')->on('nongsan');
            $table->integer('duocdanhgia')->default(0);
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
        Schema::dropIfExists('itemhoadon');
        //
    }
}
