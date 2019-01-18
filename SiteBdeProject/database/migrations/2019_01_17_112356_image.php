<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Image extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('Image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('likes')->default('0');
            $table->integer('IDEvenement')->nullable();
            $table->integer('IDCreateur');
            $table->foreign('IDEvenement')->references('id')->on('Evenement');
                    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Image');
    }
}
