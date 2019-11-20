<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courriers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('attachment')->nullable();
            $table->string('reference');
            $table->string('category');
            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->string('priority');
            $table->string('confidentiality');
            $table->dateTime('mail_date');
            $table->dateTime('mail_date_arrived');
            $table->integer('expeditor_id')->unsigned()->nullable();
            $table->foreign('expeditor_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->unsignedInteger('initiate_service_id');
            $table->string('subject');
            $table->string('nature');
            $table->string('keywords')->nullable();;
            $table->integer('service_dealing_id')->unsigned()->nullable();
            $table->foreign('service_dealing_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('destinator_id')->unsigned()->nullable();
            $table->foreign('destinator_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->boolean('deleted')->nullable();
            $table->dateTime('deadth_date')->nullable();
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
        Schema::dropIfExists('courriers');
    }
}
