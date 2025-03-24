<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    Protected $fillable = ['titre','Description','Photo','Prix','categorie_id','prestataire_id','status'];

    Protected $table = "service";
    use HasFactory;

    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function Réservation()
    {
        return $this->hasMany(Réservation::class);
    }
}
