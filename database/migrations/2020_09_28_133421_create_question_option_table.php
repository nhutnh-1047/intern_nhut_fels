<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_option', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('question_id')->unsigned();
            $table->string('option');
            $table->boolean('correct')->default(false);
            $table->timestamps();
        });

        Schema::table('question_option', function ($table) {
            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_option');
    }
}
