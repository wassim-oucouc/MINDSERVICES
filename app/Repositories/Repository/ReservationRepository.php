<?php
namespace App\Repositories\Repository;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\ReservationInterface;

class ReservationRepository implements ReservationInterface
{
    public function find($id)
    {
        $reservation = Reservation::find($id);

        return $reservation;
    }
    public function update($id,$data)
    {
        $reservation = Reservation::where('id',$id)->update($data);

        return $reservation;
    }
    public function delete($id)
    {
        $reservation = Reservation::findOrfail($id);
        if($reservation)
        {
            $reservation->delete();
            return  $reservation;
        }
    }
    public function insert($data)
    {
        $reservation = Reservation::create($data);

        return $reservation;
    }

    public function GetReservationsClient()
    {
        $reservations = Reservation::where('client_id',Auth::user()->id)->with('Service','Prestataire','Client','Professional')->get();
        

        return $reservations;
    }

    public function GetDetailsReservation($id)
    {
        $reservation = Reservation::where('id',$id)->with('Service','Prestataire','Client','Professional','Adresse','Service.category')->first();

        return $reservation;
    }
}