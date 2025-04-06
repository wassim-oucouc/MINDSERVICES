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
        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('prestataire_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->integer('addresse_id')->unsigned();
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->foreign('client_id')->references('id')->on('Utilisateur');
            $table->foreign('prestataire_id')->references('id')->on('Utilisateur');
            $table->foreign('service_id')->references('id')->on('service');
            $table->foreign('addresse_id')->references('id')->on('address_reservation');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('status');
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
