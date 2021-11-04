<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingdates', function (Blueprint $table) {
            $table->id();
            $table->enum('date',[1,2,3,4,5,6,7])->comment('1=> السبت ,2=>الاحد , 3=>الاتنين , 4=> الثلاثاء , 5=> الاربعاء , 6=>الخميس , 7=>الجمعه ');
            $table->time('from');
            $table->time('to');
            $table->boolean('status')->default(1)->comment('1=>unused,2=>Uses,3=>It was used');;
            $table->unsignedBigInteger('gymnastic_id');
            $table->unique(array('date', 'from','to','gymnastic_id'));
            $table->timestamps();
            $table->foreign('gymnastic_id')->references('id')->on('gymnastics')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainingdates');
    }
}
