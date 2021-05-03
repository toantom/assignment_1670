<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeacherDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_detail', function (Blueprint $table) {
            $table->foreignId('id_teacher');
            $table->foreign('id_teacher')->references('id')->on('teacher');
            $table->char('avatar', 255)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->date('dob')->nullable();
            $table->char('diploma', 255)->nullable();
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
