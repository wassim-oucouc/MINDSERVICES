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
        Schema::create('Utilisateur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Prenom');
            $table->string('Nom');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Photo');
            $table->integer('role_id')->unsigned();
            $table->string('Status');
            $table->foreign('role_id')->references('id')->on('Role')->onDelete('cascade');;
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
