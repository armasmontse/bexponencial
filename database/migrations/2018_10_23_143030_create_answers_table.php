<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id")->unsigned();
            $table->integer("question_challenge_id")->unsigned();

            $table->text('answer_url');
            $table->text('answer_file');
            $table->text('answer_text');
            $table->timestamp('answered_at');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('question_challenge_id')
                ->references('id')
                ->on('questions__challenges');
        });

        Schema::create('answer__logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("answer_id")->unsigned();

            $table->text('answer_url');
            $table->text('answer_file');
            $table->text('answer_text');
            $table->timestamp('answered_at');

            $table->foreign('answer_id')
                ->references('id')
                ->on('answers');
        });

        Schema::create('answer__scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id")->unsigned();
            $table->integer("answer_id")->unsigned();

            $table->decimal('score', 8, 2);
            $table->boolean('strike');
            $table->timestamp('scored_at');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('answer_id')
                ->references('id')
                ->on('answers');
        });

        Schema::create('answer__scores__logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("answer_score_id")->unsigned();

            $table->decimal('score', 8, 2);
            $table->boolean('strike');
            $table->timestamp('scored_at');

            $table->foreign('answer_score_id')
                ->references('id')
                ->on('answer__scores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
        Schema::dropIfExists('answer__logs');
        Schema::dropIfExists('answer__scores');
        Schema::dropIfExists('answer__scores__logs');
    }
}
