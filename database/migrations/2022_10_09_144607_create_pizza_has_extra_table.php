<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaHasExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_has_extra', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pizza_id')->unsigned();
            $table->bigInteger('extra_id')->unsigned();
            $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('extra_id')->references('id')->on('extras');
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
        Schema::dropIfExists('pizza_has_extra');
    }
}
