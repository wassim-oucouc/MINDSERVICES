<?php

namespace App\Models;

use App\Models\Avis;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    Protected $fillable = ['titre','Description','Photo','Prix','duration','availability','categorie_id','prestataire_id','status'];

    Protected $table = "service";
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Categorie::class,'categorie_id');
    }

    public function Reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function Prestataire()
    {
        return $this->belongsTo(Utilisateur::class,'prestataire_id');
    }

    public function Professional()
    {
        return $this->belongsTo(Prestataire::class,'prestataire_id','utilisateur_id');
    }

    public function Avis()
    {
        return $this->hasMany(Avis::class,'Service_id');
    }
}
