<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("code",4);
            $table->integer("address_id")->unsigned();
            $table->integer("plan_id")->nullable()->unsigned();

            $table->timestamps();

            $table->foreign("address_id")->references('id')->on('addresses');
            $table->foreign('plan_id')->nullable()->references('id')->on('plans');
        });

        Schema::create('user__infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();

            $table->integer('address_id')->unsigned();
            $table->string('full_name',150);

            $table->date('birth_date');
            $table->string('photo',255);
            $table->integer("school_id")->nullable()->unsigned();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("address_id")->nullable()->references("id")->on("addresses");
            $table->foreign('school_id')->nullable()->references('id')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');

        Schema::dropIfExists('user__infos');
    }
}
