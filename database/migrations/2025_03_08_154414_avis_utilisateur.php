<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Avis_Utilisateur', function (Blueprint $table){
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('prestataire_id')->unsigned();
            $table->integer('Avis_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('Utilisateur');
            $table->foreign('prestataire_id')->references('id')->on('Utilisateur');
            $table->foreign('Avis_id')->references('id')->on('Avis');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
