<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('attachment')->nullable();
            $table->string('reference');
            $table->string('category');
            $table->integer('type');
            $table->string('priority');
            $table->boolean('Confidentialité');
            $table->dateTime('mail_date');
            $table->dateTime('mail_date_arrived');
            $table->integer('expeditor');
            $table->integer('initiate_service');
            $table->string('subject');
            $table->string('keywords');
            $table->integer('treatened_service');
            $table->integer('destinator');
            $table->integer('destinator_in_copy');
            $table->boolean('deleted');
            $table->dateTime('deadth_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
