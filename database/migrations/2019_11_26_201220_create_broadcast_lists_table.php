<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcastListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadcast_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('courrier_id')->unsigned()->nullable();
            $table->foreign('courrier_id')->references('id')->on('courriers')->onDelete('cascade');
            $table->integer('destinator_id')->unsigned()->nullable();
            $table->foreign('destinator_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('reason'); // Input select box (visualise, make avis, for annotation)
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
        Schema::dropIfExists('broadcast_lists');
    }
}
