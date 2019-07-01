<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
        });

        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('description');
            $table->integer("level_id")->unsigned();
            $table->foreign('level_id')
                ->references('id')
                ->on('levels');
        });

        Schema::create('villages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->integer("block_id")->unsigned();

            $table->text('coordinates');
            $table->text('mobile_coordinates');
            $table->foreign('block_id')
                ->references('id')
                ->on('blocks');
        });

        Schema::create('missions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("village_id")->unsigned();

            $table->string('label');
            $table->string('icon', 100);
            $table->text('background');
            $table->text('mobile_coordinates');
            $table->text('coordinates');
            $table->integer('challenge_no');
            $table->text('desc_one');
            $table->text('desc_two');
            $table->text('desc_three');


            $table->foreign('village_id')
                ->references('id')
                ->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
        Schema::dropIfExists('blocks');
        Schema::dropIfExists('villages');
        Schema::dropIfExists('missions');
    }
}
