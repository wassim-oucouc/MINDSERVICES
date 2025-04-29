<?php

namespace App\Models;

use App\Models\Avis;
use App\Models\Service;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestataire extends Model
{
    Protected $fillable = ['utilisateur_id','Numero_Telephone','Adresse','zip_code','Ville','service_principal','created_at','updated_at'];
    Protected $table = "prestataire";

    public function Avis()
    {
        return $this->hasMany(Avis::class,'prestataire_id','utilisateur_id');
    }

    public  function Service()
    {
        return $this->hasMany(Service::class,'prestataire_id','utilisateur_id');
    }

    public function Utilisateur()
    {
        return $this->belongsTo(Utilisateur::class,'utilisateur_id');
    }

   
    use HasFactory;
}
