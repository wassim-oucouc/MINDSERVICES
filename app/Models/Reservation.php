<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Prestataire;
use App\Models\Utilisateur;
use App\Models\address_reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    Protected $table = "reservation";

    Protected $fillable = ["client_id","prestataire_id","service_id","addresse_id","reservation_date","reservation_time","created_at","updated_at","status"];
    public function Service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function Prestataire()
    {
        return $this->belongsTo(Utilisateur::class,'prestataire_id');
    }

    public function Professional()
    {
        return $this->belongsTo(Prestataire::class,'prestataire_id','utilisateur_id');
    }

    public function Client()
    {
        return $this->belongsTo(Utilisateur::class,'client_id');
    }

    public function Adresse()
    {
        return $this->belongsTo(address_reservation::class,'addresse_id');
    }
}