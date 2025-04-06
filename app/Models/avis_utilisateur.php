<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avis_utilisateur extends Model
{

    protected $table = 'avis_utilisateur';
    protected $fillable = ['Avis_id', 'client_id', 'prestataire_id', 'Service_id'];

    public function Avis()
    {
        return $this->belongsTo(Avis::class,'Avis_id');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class, 'prestataire_id');
    }
    use HasFactory;
}
