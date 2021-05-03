<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClassStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_class');
            $table->foreign('id_class')->references('id')->on('classroom');
            $table->foreignId('id_student');
            $table->foreign('id_student')->references('id')->on('student');
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
        //
    }
}
