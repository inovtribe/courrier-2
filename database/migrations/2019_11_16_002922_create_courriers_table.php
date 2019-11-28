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
            $table->unsignedInteger('initiate_service_id')->nullable();
            $table->unsignedInteger('service_dealing_id')->nullable();
            $table->unsignedInteger('destinator_id')->nullable();
            $table->string('subject');
            $table->string('nature');
            $table->string('keywords')->nullable();;
            $table->dateTime('limit_processing_date')->nullable();
            $table->boolean('deleted')->nullable();
            $table->boolean('archived')->nullable();
            $table->boolean('noticed')->nullable();
            $table->boolean('annotated')->nullable();
            $table->string('mention'); // Avis favorable, Classé sans suite,
            $table->string('status'); // Traitementen en cours, Non traité, Traité
            // $table->string('state'); // Attente d'avis, avis favorable, avis défavorable, aucun
            $table->boolean('valid')->nullable(); // Admin service pour valider courrier de son collaborateur n-1
            $table->unsignedInteger('folder_id')->nullable();
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
