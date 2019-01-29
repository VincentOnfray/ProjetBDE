<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Commande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::connection('BDDlocal')->create('commande', function (Blueprint $table) {
            $table->integer('idutilisateur');
            $table->integer('idarticle');
            $table->foreign('idarticle')->references('id')->on('article');
            $table->string('status')->default('panier');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('BDDlocal')->drop('commande');    }
}
