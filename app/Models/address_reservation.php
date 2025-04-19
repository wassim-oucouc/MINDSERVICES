<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address_reservation extends Model
{
    Protected $table = "address_reservation";

    Protected $fillable = ["address","city","postal_code","country","created_at","updated_at"];

    
    use HasFactory;
}
