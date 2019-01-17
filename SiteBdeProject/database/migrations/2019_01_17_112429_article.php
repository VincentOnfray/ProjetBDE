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
         Schema::create('Article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('Description');
            $table->integer('Prix')->default('0');
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
        Schema::drop('Article');
    }
}
