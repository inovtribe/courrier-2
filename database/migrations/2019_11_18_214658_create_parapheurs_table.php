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
            $table->string('status');
            $table->unsignedInteger('initiate_service_id')->nullable();
            $table->unsignedInteger('dealing_service_id')->nullable();
            $table->unsignedInteger('destinator_id')->nullable();
            $table->unsignedInteger('expeditor_id')->nullable();
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
