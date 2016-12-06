<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('tags');
            $table->string('subject');
            $table->string('chapter');
            $table->string('description');
            $table->binary('image');
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::drop('questions');
    }
}
