<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evenement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Evenement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Description');
            $table->date('Date');
            $table->boolean('Recurrence');
            $table->integer('prix')->default('0');
            $table->integer('IDCreateur');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Evenement');
    }
}
