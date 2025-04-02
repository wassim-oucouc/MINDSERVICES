<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Prestataire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avis extends Model
{
    Protected $fillable = ['Note','Commentaire','status','client_id','prestataire_id','Service_id','created_at','updated_at'];

    public function Client()
    {
        return $this->belongsTo(Utilisateur::class,'Client_id');
    }

    public function Prestataire()
    {
        return $this->belongsTo(Utilisateur::class,'prestataire_id');
    }

  
    use HasFactory;
}
