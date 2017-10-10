<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id')->unsigned()->index();
            $table->foreign('appointment_id')->references('id')
                ->on('appointmens')->onDelete('cascade');
            $table->integer('medicine_id')->unsigned()->index();
            $table->foreign('medicine_id')->references('id')
                ->on('medicines')->onDelete('cascade');
            $table->integer('quantity');
            $table->text('observations');
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
        Schema::dropIfExists('recipes');
    }
}
