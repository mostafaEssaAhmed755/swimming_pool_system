<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingsessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coach_id');
            $table->unsignedBigInteger('gymnastic_id');
            $table->unsignedBigInteger('trainingdate_id');
            $table->boolean('status');
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade');
            $table->foreign('gymnastic_id')->references('id')->on('gymnastics')->onDelete('cascade');
            $table->foreign('trainingdate_id')->references('id')->on('trainingdates')->onDelete('cascade');

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
        Schema::dropIfExists('trainingsessions');
    }
}
