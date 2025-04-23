<?php

namespace App\Models;

use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    Protected $fillable = ['telephone','pays','id_client','created_at','updated_at'];
    Protected $table = "Client";

    public function ClientInfo()
    {
        return $this->belongsTo(Client::class,'id_client');
    }
 
     use HasFactory;
}
