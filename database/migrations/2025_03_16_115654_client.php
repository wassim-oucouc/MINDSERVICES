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
        Schema::create('Client',function(Blueprint $table){
            $table->string('Phone_number');
            $table->string('pays');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id')->on('Utilisateur');
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
