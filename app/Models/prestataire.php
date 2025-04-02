<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    Protected $fillable = ['utilisateur_id','Numero_Telephone','Adresse','zip_code','Ville','service_principal','created_at','updated_at'];
    Protected $table = "prestataire";

    public function Avis()
    {
        return $this->hasMany(Avis::class);
    }
    use HasFactory;
}
