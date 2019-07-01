<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be__stats', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->decimal("coins",8,2);
            $table->decimal("exp_points",8,2);
            $table->timestamps();
            $table->primary(["user_id"]);
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('be__stats');
    }
}
