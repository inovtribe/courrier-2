<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('subject');
            $table->string('content');
            $table->integer('profile_id')->unsigned()->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->integer('courrier_id')->unsigned()->nullable();
            $table->foreign('courrier_id')->references('id')->on('courriers')->onDelete('cascade');
            $table->integer('parapher_id')->unsigned()->nullable();
            $table->foreign('parapher_id')->references('id')->on('paraphers')->onDelete('cascade');
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
        Schema::dropIfExists('responses');
    }
}
