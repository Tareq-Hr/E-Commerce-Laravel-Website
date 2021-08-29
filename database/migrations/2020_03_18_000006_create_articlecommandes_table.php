<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlecommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articlecommandes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cmd')->unsigned()->nullable();
            $table->foreign('id_cmd')
                    ->references('id')
                    ->on('commandes')
                    ->onDelete('cascade');
            $table->integer('id_article')->unsigned()->nullable();
            $table->foreign('id_article')
                    ->references('id')
                    ->on('articles')
                    ->onDelete('cascade');
            $table->integer('qty');
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
        Schema::dropIfExists('articlecommandes');
    }
}
