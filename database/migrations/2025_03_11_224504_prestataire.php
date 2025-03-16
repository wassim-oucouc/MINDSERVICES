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
        Schema::create('Paiement', function (Blueprint $table){
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('reservation_id')->unsigned();
            $table->integer('prestataire_id')->unsigned();
            $table->integer('Avis_id')->unsigned();
            $table->integer('Montant');
            $table->string('ModePaiement');
            $table->foreign('client_id')->references('id')->on('Utilisateur');
            $table->foreign('prestataire_id')->references('id')->on('Utilisateur');
            $table->foreign('Avis_id')->references('id')->on('avis');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
