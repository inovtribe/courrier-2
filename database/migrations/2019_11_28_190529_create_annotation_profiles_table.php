<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnotationProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annotation_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('annotation_id')->unsigned()->nullable();
            $table->foreign('annotation_id')->references('id')->on('annotations')->onDelete('cascade');
            $table->integer('profile_id')->unsigned()->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
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
        Schema::dropIfExists('annotation_profiles');
    }
}
