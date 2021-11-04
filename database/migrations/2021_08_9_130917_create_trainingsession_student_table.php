<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsessionStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingsession_student', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('trainingsession_id');
            $table->primary(['student_id','trainingsession_id']);
            $table->foreign('student_id')
                    ->references('id')
                    ->on('student')
                    ->onDelete('cascade');
             $table->foreign('trainingsession_id')
                    ->references('id')
                    ->on('trainingsessions')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('trainingsession_student');
    }
}
