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
            $table->boolean('confidentiality');
            $table->dateTime('mail_date');
            $table->dateTime('mail_date_arrived');
            $table->integer('expeditor');
            $table->integer('initiate_service');
            $table->string('subject');
            $table->string('keywords');
            $table->integer('service_dealing');
            $table->integer('destinator');
            $table->integer('destinator_in_copy');
            $table->boolean('deleted');
            $table->dateTime('deadth_date');
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
