<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConfirm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('eventos_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('number');
            $table->timestamps();

            $table->foreign('eventos_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirm');
    }
}
