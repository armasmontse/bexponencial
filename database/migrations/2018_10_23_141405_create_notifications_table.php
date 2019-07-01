<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string("type",50)->unique();
            $table->text("description");
            $table->string("recurrence",50);
            $table->timestamps();
        });

        Schema::create('notification_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('notification_id')->unsigned();
            $table->timestamps();
            $table->primary(["user_id","notification_id"]);

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("notification_id")->references("id")->on("notifications");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('user__notifications');
    }
}
