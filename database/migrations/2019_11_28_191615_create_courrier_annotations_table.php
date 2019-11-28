<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourrierAnnotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courrier_annotations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('annotation_id')->unsigned()->nullable();
            $table->foreign('annotation_id')->references('id')->on('annotations')->onDelete('cascade');
            $table->integer('courrier_id')->unsigned()->nullable();
            $table->foreign('courrier_id')->references('id')->on('courriers')->onDelete('cascade');
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
        Schema::dropIfExists('courrier_annotations');
    }
}
