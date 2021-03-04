<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->onDelete('cascade');;   
            $table->unsignedBigInteger('user_id')->onDelete('cascade');;   
            $table->boolean('has_occured');
            $table->string('patient_name');
            $table->dateTime('time_from');
            $table->dateTime('time_to');
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
