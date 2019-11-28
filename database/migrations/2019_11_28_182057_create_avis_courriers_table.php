<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avis_courriers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avis_id')->unsigned()->nullable();
            $table->foreign('avis_id')->references('id')->on('avis')->onDelete('cascade');
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
        Schema::dropIfExists('avis_courriers');
    }
}
