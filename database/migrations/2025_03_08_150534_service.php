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
        Schema::create('Service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('Description');
            $table->string('Photo');
            $table->float('Prix');
            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('Categorie')->onDelete('cascade');
            $table->integer('prestataire_id')->unsigned();
            $table->foreign('prestataire_id')->references('id')->on('Utilisateur')->onDelete('cascade');
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
