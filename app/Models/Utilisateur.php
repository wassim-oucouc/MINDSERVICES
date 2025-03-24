<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateur extends Authenticatable
{
    Protected $Fillable = ['Prenom','Nom','Email','Password','Photo','role_id','Status','created_at','updated_at'];

    Protected $table = "utilisateur";
    use HasFactory;

    public function Role()
    {
        return $this->hasOne(Role::class);
    }
}
