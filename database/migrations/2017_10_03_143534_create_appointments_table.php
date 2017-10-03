<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointmens', function (Blueprint $table) {
            $table->increments('id');
            $table->date('appointment_date');
            $table->integer('expedient')->unsigned();
            $table->foreign('expedient')->references('id')
                ->on("users")->onDelete('cascade');
            $table->integer('hour');
            $table->integer('doctor')->unsigned();
            $table->foreign('doctor')->references('id')
                ->on("users")->onDelete('cascade');
            $table->decimal('weight')->nullable();
            $table->decimal('height')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('appointmens');
    }
}
