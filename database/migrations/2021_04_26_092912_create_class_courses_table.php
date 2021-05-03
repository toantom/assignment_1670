<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_class');
            $table->foreign('id_class')->references('id')->on('classroom');
            $table->foreignId('id_course');
            $table->foreign('id_course')->references('id')->on('course');
            $table->foreignId('id_teacher')->nullable();
            $table->foreign('id_teacher')->references('id')->on('teacher');
            $table->tinyInteger('frametime')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('class_courses');
    }
}
