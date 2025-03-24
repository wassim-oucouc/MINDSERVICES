<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    Protected $fillable = ['Nom','Description','Photo','created_at','updated_at'];
    Protected $table = "categorie";
    use HasFactory;


    public function Service()
    {
        return $this->hasMany(Service::class);
    }
}
