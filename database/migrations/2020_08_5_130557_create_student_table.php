<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender',[1,2])->comment('1=>ذكر,2=>أنثي');
            $table->string('image')->nullable();
            $table->integer('age');
            $table->bigInteger('uid')->unique();
            $table->bigInteger('identification')->unique();
            $table->string('adress')->nullable();
            $table->string('mobile')->unique();
            $table->date('expire');
            $table->bigInteger('point')->default(0);
            $table->integer('user_id');
            $table->string('parentNam')->nullable();
            $table->string('parentNum')->nullable();
            $table->unsignedBigInteger('system_id');
            $table->unsignedBigInteger('gymnastic_id');
            $table->foreign('system_id')->references('id')->on('systems')->onDelete('cascade');
            $table->foreign('gymnastic_id')->references('id')->on('gymnastics')->onDelete('cascade');

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
        Schema::dropIfExists('student');
    }
}
