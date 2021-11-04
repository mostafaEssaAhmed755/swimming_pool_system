<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreparingsessionsStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparingsessions_student', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('preparingsession_id');
            $table->primary(['student_id','preparingsession_id']);
            $table->foreign('student_id')
                ->references('id')
                ->on('student')
                ->onDelete('cascade');
             $table->foreign('preparingsession_id')
                ->references('id')
                ->on('preparingsessions')
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
        Schema::dropIfExists('preparingsessions_student');
    }
}
