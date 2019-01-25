<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Like extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('BDDlocal')->create('Like', function (Blueprint $table) {
            $table->integer('idutilisateur');
            $table->integer('idimage');
            $table->foreign('idimage')->references('id')->on('Image');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::connection('BDDlocal')->drop('Like');
    }
}
