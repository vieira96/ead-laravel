<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf8_general_ci');
            $table->string('image')->collation('utf8_general_ci');
            $table->text('description')->nullable()->collation('utf8_general_ci');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf8_general_ci');
            $table->string('email')->collation('utf8_general_ci');
            $table->string('password')->collation('utf8_general_ci');
        });

        Schema::create('student_course', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('student_id');
        });

        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->string('name')->collation('utf8_general_ci');
        });

        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->integer('module_id');
            $table->integer('course_id');
            $table->integer('order');
            $table->string('type')->collation('utf8_general_ci');
        });

        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->string('name')->collation('utf8_general_ci');
            $table->text('description')->nullable()->collation('utf8_general_ci');
            $table->string('url')->nullable()->collation('utf8_general_ci');
        });

        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->string('question')->collation('utf8_general_ci');
            $table->string('option1')->nullable()->collation('utf8_general_ci');
            $table->string('option2')->nullable()->collation('utf8_general_ci');
            $table->string('option3')->nullable()->collation('utf8_general_ci');
            $table->string('option4')->nullable()->collation('utf8_general_ci');
            $table->tinyInteger('answer');
        });

        Schema::create('historic', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_viewed');
            $table->integer('student_id');
            $table->integer('class_id'); 
        });
        
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_tables');
    }
}
