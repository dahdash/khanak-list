<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author');
            $table->string('illustrator');
            $table->string('translator');
            $table->string('publisher');
            $table->string('publishing_year');
            $table->integer('price');
            $table->string('age_group');
            $table->string('educational_stage');
            $table->string('type');
            $table->string('illustration');
            $table->integer('priority');
            $table->boolean('has_handbook');
            $table->boolean('has_activity');
            $table->boolean('reading_aloud');
            $table->text('description');
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
        Schema::drop('books');
    }
}
