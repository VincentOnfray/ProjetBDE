<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Inscription', function (Blueprint $table) {
            $table->integer('IDInscrit');
            $table->integer('IDEvenement');
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
        Schema::drop('Inscription');
    }
}
