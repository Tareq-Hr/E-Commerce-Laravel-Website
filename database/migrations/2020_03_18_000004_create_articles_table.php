<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->increments('id'); 

            $table->string('titre');

            $table->text('contenu');

            $table->double('prix_vente');
            
            $table->double('prix_promo');

            $table->string('tags');

            $table->string('taille');

            $table->double('poids');

            $table->double('litrage');

            $table->string('inventaire');

            $table->string('materiau');

            $table->string('couleur');

            $table->string('reference');

            $table->integer('categorie')->unsigned()->nullable();
            $table->foreign('categorie')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');

            $table->integer('image')->unsigned()->nullable();
            $table->foreign('image')
                    ->references('id')
                    ->on('media')
                    ->onDelete('set null');

            $table->integer('image1')->unsigned()->nullable();
            $table->foreign('image1')
                    ->references('id')
                    ->on('media')
                    ->onDelete('set null');

            $table->integer('image2')->unsigned()->nullable();
            $table->foreign('image2')
                    ->references('id')
                    ->on('media')
                    ->onDelete('set null');

            $table->integer('image3')->unsigned()->nullable();
            $table->foreign('image3')
                    ->references('id')
                    ->on('media')
                    ->onDelete('set null');

            $table->integer('image4')->unsigned()->nullable();
            $table->foreign('image4')
                    ->references('id')
                    ->on('media')
                    ->onDelete('set null');

            $table->integer('image5')->unsigned()->nullable();
            $table->foreign('image5')
                    ->references('id')
                    ->on('media')
                    ->onDelete('set null');
                    
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
        Schema::dropIfExists('articles');
    }
}
