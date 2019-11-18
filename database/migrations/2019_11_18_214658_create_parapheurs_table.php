<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParapheursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parapheurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conformity')->nullable();
            $table->integer('initiate_service')->unsigned()->nullable();
            $table->foreign('initiate_service')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('parapheurs');
    }
}
