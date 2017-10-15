<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeHandbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_handbook', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grade_id')->unsigned();
            $table->integer('handbook_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('handbook_id')->references('id')->on('handbooks')->onDelete('cascade');
            $table->integer('count');
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
        Schema::drop('grade_handbook');
    }
}
