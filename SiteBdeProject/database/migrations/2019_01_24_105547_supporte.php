<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Supporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('BDDlocal')->create('Supporte', function (Blueprint $table) {
            $table->integer('idutilisateur');
            $table->integer('idproposition');
            $table->foreign('idproposition')->references('id')->on('Proposition');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::connection('BDDlocal')->drop('Supporte');
    }
}
