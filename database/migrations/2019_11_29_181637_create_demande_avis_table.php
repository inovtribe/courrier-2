<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandeAvisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_avis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expeditor_id')->nullable();
            $table->foreign('expeditor_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->integer('destinator_id')->nullable();
            $table->foreign('destinator_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedInteger('courrier_id')->nullable();
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
        Schema::dropIfExists('demande_avis');
    }
}
