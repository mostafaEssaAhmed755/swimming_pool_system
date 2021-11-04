<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->bigInteger('uid')->unique();
            $table->bigInteger('identification')->unique();
            $table->string('adress')->nullable();
            $table->string('mobile_1')->unique();
            $table->string('mobile_2')->unique()->nullable();
            $table->date('joinDate')->nullable();
            $table->bigInteger('salary')->default(0);
            $table->integer('user_id');
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

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
        Schema::dropIfExists('employees');
    }
}
