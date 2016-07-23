<?php

use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: galleries
         */
        Schema::create('galleries', function ($table) {
            $table->increments('id');
            $table->string('title', 250)->nullable();
            $table->text('image')->nullable();
            $table->longText('images')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('published', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('status', ['show', 'hide'])->default('hide')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('galleries');
    }
}
