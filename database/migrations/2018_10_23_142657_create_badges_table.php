<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->unique();
        });

        Schema::create('badge_user', function (Blueprint $table) {
            $table->integer("user_id")->unsigned();
            $table->integer("badge_id")->unsigned();

            $table->primary(['user_id', 'badge_id']);

            $table->decimal('score', 8, 2);

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('badge_id')
                ->references('id')
                ->on('badges');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badges');
        Schema::dropIfExists('badge_user');
    }
}
