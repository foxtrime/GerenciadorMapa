<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConteudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteudos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->decimal('lat',10,8);
            $table->decimal('lng',10,8);
            $table->integer('icon_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('conteudos', function($table){
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });

        Schema::table('conteudos', function($table){
            $table->foreign('icon_id')->references('id')->on('icons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('conteudos');
    }
}
