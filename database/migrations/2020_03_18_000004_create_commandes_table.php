<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('client')->unsigned()->nullable();
            $table->foreign('client')->references('id')->on('clients')->onDelete('set null');
            $table->integer('coupon')->unsigned()->nullable();
            $table->foreign('coupon')->references('id')->on('coupons')->onDelete('set null');
            $table->integer('total');
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
        Schema::dropIfExists('commandes');
    }
}
