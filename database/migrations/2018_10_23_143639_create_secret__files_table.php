<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecretFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secret__files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('village_id')->nullable()->unsigned();
            $table->decimal('price', 8, 2);
            $table->text('description');

            $table->foreign('village_id')->references('id')->on('villages');

        });

        Schema::create('files__info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('file_name', 100);
            $table->text('url');
            $table->text('description');
            $table->string('type');
        });

        Schema::create('secret__file__contents', function (Blueprint $table) {
            $table->integer("secret_file_id")->unsigned();
            $table->integer("file_info_id")->unsigned();
            $table->primary(['secret_file_id', 'file_info_id']);
            $table->foreign('secret_file_id')
                ->references('id')
                ->on('secret__files');
            $table->foreign('file_info_id')
                ->references('id')
                ->on('files__info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secret__files');
        Schema::dropIfExists('files_info');
        Schema::dropIfExists('secret__file__contents');
    }
}
