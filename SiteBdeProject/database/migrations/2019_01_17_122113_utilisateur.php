<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Utilisateur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::connection('BDDnat')->create('Utilisateur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Prenom');
            $table->string('Nom'); 
            $table->string('Mail');
            $table->string('MDP');
            $table->string('Role');
            $table->integer('IDCentre');
            $table->foreign('IDCentre')->references('id')->on('Centre');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('BDDnat')->drop('Utilisateur');
    }
}
