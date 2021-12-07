<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nongsan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nongsan', function (Blueprint $table) {
            $table->id();
            $table->string('tenNongSan')->nullable();
            $table->bigInteger('gia')->nullable();
            $table->bigInteger('soluong')->nullable();
            $table->unsignedBigInteger('create_by')->nullable();
            $table->unsignedBigInteger('id_danhmuc');
            $table->text('noisanxuat')->nullable();
            $table->foreign('id_danhmuc')->references('id')->on('danhmuc');
            $table->text('noidung')->nullable();
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
        Schema::dropIfExists('nongsan');
    }
}
