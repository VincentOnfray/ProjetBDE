<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Utilisateurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::connection('BDDnat')->create('utilisateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname'); 
            $table->string('mail');
            $table->string('password');
            $table->string('role');
            $table->integer('centre')->default('1');
            $table->foreign('centre')->references('id')->on('Centre');
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
        Schema::connection('BDDnat')->drop('utilisateurs');
    }
}
