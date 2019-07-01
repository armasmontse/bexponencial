<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question__types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->text('allowed_content');
        });

        Schema::create('challenge__types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
        });

        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("challenge_type_id")->unsigned();
            $table->integer("mission_id")->unsigned();
            $table->decimal('coins', 8, 2);
            $table->decimal('exp_points', 8, 2);
            $table->integer('sequence_no');
            $table->boolean('global');

            $table->foreign('challenge_type_id')
                ->references('id')
                ->on('challenge__types');
            $table->foreign('mission_id')
                ->references('id')
                ->on('missions');
        });

        Schema::create('questions__challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("challenge_id")->unsigned();
            $table->integer("question_type_id")->unsigned();

            $table->text('question');
            $table->boolean('required');

            $table->foreign('challenge_id')
                ->references('id')
                ->on('challenges');
            $table->foreign('question_type_id')
                ->references('id')
                ->on('question__types');
        });

        Schema::create('tips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("challenge_id")->unsigned();

            $table->text('content');
            $table->decimal('price', 8, 2);

            $table->foreign('challenge_id')
                ->references('id')
                ->on('challenges');
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->text("label");
            $table->decimal("max_points",8,2)->default(0);

        });

        Schema::create('skill_user', function (Blueprint $table) {
            $table->integer('skill_id')->unsigned();;
            $table->integer("user_id")->unsigned();;
            $table->decimal("value",8,2)->default(0);;
            $table->primary(["skill_id","user_id"]);

            $table->foreign("skill_id")->references("id")->on("skills");
            $table->foreign("user_id")->references("id")->on("users");

        });

        Schema::create('challenge_skill', function (Blueprint $table) {
            $table->integer('challenge_id')->unsigned();;
            $table->integer("skill_id")->unsigned();;
            $table->decimal("value",8,2)->default(0);
            $table->primary(["challenge_id","skill_id"]);

            $table->foreign("challenge_id")->references("id")->on("challenges");
            $table->foreign("skill_id")->references("id")->on("skills");

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question__types');
        Schema::dropIfExists('challenge__types');
        Schema::dropIfExists('challenges');
        Schema::dropIfExists('questions__challenges');
        Schema::dropIfExists('tips');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('skills_user');
        Schema::dropIfExists('challenge_skills');
    }
}
