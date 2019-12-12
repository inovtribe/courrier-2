<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParaphersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paraphers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('expeditor_id')->unsigned()->nullable();
            $table->foreign('expeditor_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->integer('destinator_id')->unsigned()->nullable();
            $table->foreign('destinator_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('paraphers');
    }
}
