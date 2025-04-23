<?php
namespace App\Repositories\Repository;

use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\ReservationInterface;

class ReservationRepository implements ReservationInterface
{
    public function find($id)
    {
        $reservation = Reservation::find($id);

        return $reservation;
    }

    public function FindReservationByDate($date)
    {
        $reservation = Reservation::where('reservation_date',$date)->first();

        return $reservation;
    }

    public function FindReservationByDateAndTime($date,$time)
    {
        $reservation = Reservation::where('reservation_date',$date)->where('reservation_time',$time)->first();

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
        $reservation = DB::table('reservation')->insertGetId($data);

        return $reservation;
    }

    public function GetReservationsClient()
    {
        $reservations = Reservation::where('client_id',Auth::user()->id)->with('Service','Prestataire','Client','Professional')->paginate(5);
        

        return $reservations;
    }

    public function GetDetailsReservation($id)
    {
        $reservation = Reservation::where('id',$id)->with('Service','Prestataire','Client.Client','Professional','Adresse','Service.category')->first();

        return $reservation;
    }

    public function GetReservationsPaginate($id)
    {
        $reservation = Reservation::where('prestataire_id',$id)->with('Service','Prestataire')->limit(4)->get();

        return $reservation;
    }

    public function CountReservationEncours($id)
    {
        $total = reservation::where('prestataire_id',$id)->where('status','En attente')->count();

        return $total;
    }

    public function GetReservationsTerminer($id)
    {
        $total = Reservation::where('prestataire_id',$id)->where('status','Terminée')->count();

        return $total;
    }

    public function GetReservationsByPrestataire($id)
    {
        $reservations = Reservation::where('prestataire_id',$id)->with('Service','Client')->paginate(5);

        return $reservations;
    }

    public function CancelReservationById($id)
    {
        $reservation = Reservation::find($id);

        if($reservation)
        {
            $reservation->update([
                "status" => "Annulée"
            ]);
        }
        return false;
    }

    public function ConfirmReservationByid($id)
    {
        $reservation = Reservation::find($id);

        if($reservation)
        {
            $reservation->update([
                "status" => "Confirmée"
            ]);
        }

        return false;
    }
}