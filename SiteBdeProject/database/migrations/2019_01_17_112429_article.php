<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::connection('BDDlocal')->create('Article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('Description');
            $table->integer('prix')->default('0');
            $table->integer('Ventes')->default('0');
            $table->String('Catégorie');
            $table->String('Image');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('BDDlocal')->drop('Article');
    }
}
