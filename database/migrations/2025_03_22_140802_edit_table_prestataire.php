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
        Schema::table('prestataire', function(Blueprint $table)
{
    $table->renameColumn('Numero_Telephone', 'phone_number');
    $table->renameColumn('Ville', 'city');
    $table->renameColumn('Adresse', 'addresse');
    $table->renameColumn('prestataire_id', 'utilisateur_id');

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
