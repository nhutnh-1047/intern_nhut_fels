<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonTopicOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_topic_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lesson_topic_id')->unsigned();
            $table->string('option');
            $table->timestamps();
        });

        Schema::table('lesson_topic_options', function ($table) {
            $table->foreign('lesson_topic_id')
                ->references('id')
                ->on('lesson_topics')
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
        Schema::dropIfExists('lesson_topic_options');
    }
}
