<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_detail', function (Blueprint $table) {
            $table->foreignId('id_student');
            $table->foreign('id_student')->references('id')->on('student');
            $table->char('avatar', 255)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->date('dob')->nullable();
            $table->float('ielst',8,2)->nullable();
            $table->char('hobby', 255)->nullable();
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
