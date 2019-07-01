<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name',50)->unique();
            $table->string('email',50)->unique();
            $table->string('password');
            $table->boolean('active');
            $table->rememberToken();
            $table->timestamps();

        });



        Schema::create('relationships', function (Blueprint $table) {
            $table->increments('id');
            $table->string("label")->unique();
            $table->timestamps();
        });

        Schema::create('user__relationships', function (Blueprint $table) {
            $table->integer("user_idf")->unsigned();
            $table->integer("user_ids")->unsigned();
            $table->integer("relationship_id")->unsigned();

            $table->primary(['user_idf','user_ids','relationship_id']);

            $table->foreign('user_idf')->references('id')->on('users');
            $table->foreign('user_ids')->references('id')->on('users');
            $table->foreign('relationship_id')->references('id')->on('relationships');
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('users');

        Schema::dropIfExists('relationships');
        Schema::dropIfExists('user__relationships');
    }
}
