<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Yeuthich extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeuthich', function (Blueprint $table) {

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_nongsan');


            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_nongsan')->references('id')->on('nongsan');
            $table->primary(array('id_user', 'id_nongsan'));
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
        Schema::dropIfExists('yeuthich');
        //
    }
}
