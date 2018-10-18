<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleriesTable extends Migration
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
        Schema::create(config('litecms.gallery.gallery.model.table'), function ($table) {
            $table->increments('id');
            $table->string('title', 250)->nullable();
            $table->text('details')->nullable();
            $table->longText('images')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['Show','Hide'])->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type', 200)->nullable();
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
        Schema::drop(config('litecms.gallery.gallery.model.table'));
    }
}
