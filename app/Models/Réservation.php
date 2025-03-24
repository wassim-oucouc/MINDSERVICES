<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Réservation extends Model
{
    use HasFactory;

    public function Service()
    {
        return $this->belongsTo(Service::class);
    }
}
