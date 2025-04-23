<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateur extends Authenticatable
{
    Protected $fillable = ['id','Prenom','Nom','Email','Password','Photo','role_id','Status','created_at','updated_at'];

    Protected $table = "utilisateur";
    use HasFactory;

    public function Role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function Professional()
    {
        return $this->hasOne(Prestataire::class,'utilisateur_id');
    }

    public function Client()
    {
        return $this->hasOne(Client::class,'id_client');
    }

    public function Avis()
    {
        return $this->hasMany(Avis::class,'prestataire_id');
    }

    
}
