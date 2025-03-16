<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestataire extends Model
{
    Protected $fillable = ['utilisateur_id','phone_number','address','zip_code','city','service_principal','created_at','updated_at'];
    Protected $table = "prestataire";
    use HasFactory;
}
