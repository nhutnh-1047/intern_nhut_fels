<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordLearnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_learns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('word_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Schema::table('word_learns', function ($table) {
            $table->foreign('word_id')
                ->references('id')
                ->on('words')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('word_learns');
    }
}
