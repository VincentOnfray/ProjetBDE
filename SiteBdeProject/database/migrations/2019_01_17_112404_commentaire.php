<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Commentaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Commentaire', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Contenu');
            $table->integer('IDImage');
            $table->integer('IDCreateur');
            $table->foreign('IDImage')->references('id')->on('Image');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Commentaire');
    }
}
