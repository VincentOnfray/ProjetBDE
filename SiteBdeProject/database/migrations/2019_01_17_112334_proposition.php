<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proposition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::connection('BDDlocal')->create('Proposition', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('description');
            $table->integer('likes')->default('0');
            $table->integer('IDutilisateur');
            $table->integer('IDImage');
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
        Schema::connection('BDDlocal')->drop('Proposition');
    }
}
