<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('existence');
            $table->integer('purpose_id')->unsigned();
            $table->foreign('purpose_id')->references('id')
                ->on('purposes')->onDelete('cascade');
            $table->integer('presentation_id')->unsigned();
            $table->foreign('presentation_id')->references('id')
                ->on('presentations')->onDelete('cascade');

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
        Schema::dropIfExists('medicines');
    }
}
