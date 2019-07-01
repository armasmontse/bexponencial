<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan_token', 150)->unique();
            $table->string('plan_name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->boolean('default');
            $table->timestamps();
        });

        Schema::create('payment__types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->unique();
            $table->timestamps();
        });

        Schema::create('user__payment__methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string("platform_token", 150)->unique();
            $table->string("recurrence",50);
            $table->integer("user_id")->unsigned();
            $table->integer("payment_type_id")->unsigned();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("payment_type_id")->references("id")->on("payment__types");
        });

        Schema::create('user__plans', function (Blueprint $table) {
            //$table->integer("user_id")->unsigned();
            $table->string('subscription_token', 150)->unique();
            $table->integer("plan_id")->unsigned();
            $table->integer("payment_method_id")->unsigned();

            $table->timestamps();

            $table->primary( ["subscription_token"]);

            //$table->foreign('user_id')->references("id")->on("users");
            $table->foreign('plan_id')->references("id")->on("plans");
            $table->foreign('payment_method_id')->references("id")->on("user__payment__methods");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
        Schema::dropIfExists('payment__types');

        Schema::dropIfExists('user__payment__methods');
        Schema::dropIfExists('user__plans');


    }
}
