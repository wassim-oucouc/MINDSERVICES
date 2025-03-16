<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    Protected $fillable = ['Phone_number','pays','id_client','created_at','updated_at'];
    Protected $table = "Client";
    use HasFactory;
}
