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
        Schema::create('avis', function (Blueprint $table) {
            $table->increments('id');
            $table->float('Note');
            $table->string('Commentaire');
            $table->string('status');
            $table->integer('client_id')->unsigned();
            $table->integer('prestataire_id')->unsigned();
            $table->integer('Service_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('Utilisateur');
            $table->foreign('prestataire_id')->references('id')->on('Utilisateur');
            $table->foreign('Service_id')->references('id')->on('Service');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avis', function (Blueprint $table) {
            //
        });
    }
};
