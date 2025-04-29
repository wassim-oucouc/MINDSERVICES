<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $fillable = ['email','amount','currency','reservation_id','stripe_session_id','payment_status','created_at','updated_at'];
    use HasFactory;
    public function Reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
