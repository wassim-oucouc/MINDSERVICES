<?php
namespace App\Repositories\Repository;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\ClientInterface;


class ClientRepository implements ClientInterface
{
    public function GetclientDetails()
    {
        $client = DB::table('utilisateur')
        ->join('client', 'client.id_client', '=', 'utilisateur.id')
        ->where('utilisateur.id', Auth::user()->id)
            ->select(
                'client.telephone',
                'client.pays',
                'utilisateur.id',
                'utilisateur.Prenom',
                'utilisateur.Nom',
                'utilisateur.Email',
                'utilisateur.Photo',
                'utilisateur.created_at'
            )
        ->first();
            return $client;
    }

    public function GetStatisticByClientId($id)
    {
        $totalreservation = Reservation::where('client_id',$id)->count();

        $reservationpending = Reservation::where('client_id',$id)->where('status','En attente')->count();

        $reservationconfirmer = Reservation::where('client_id',$id)->where('status','Confirmée')->count();

        $reservationannuler = Reservation::where('client_id',$id)->where('status','Annulée')->count();

        $statistic = [
            "totalreservation" => $totalreservation,
            "reservationpending" => $reservationpending,
            "reservationconfirmer" => $reservationconfirmer,
            "reservationannuler" => $reservationannuler
        ];

        return $statistic;
    }

        public function GetReservationsDetails()
        {
            $reservations = DB::table('reservation')
            ->join('service','reservation.service_id','=','service.id')
            ->join('utilisateur','utilisateur.id','=','service.prestataire_id')
            ->join('categorie','categorie_id','=','categorie.id')
            ->where('client_id',Auth::user()->id)->orderBy('reservation.id', 'desc')->limit(3)->select('service.titre','service.Photo','Service.description','service.Prix','reservation.reservation_date','reservation.reservation_time','utilisateur.Prenom','utilisateur.Nom','reservation.id','reservation.status','categorie.Nom AS CategorieNom')->get();
return $reservations;
        }

        public function find($id)
        {
         $utilisateur =    Utilisateur::find($id);

         return $utilisateur;
            
        }
        public function update($id,$data)
        {
            $utilisateur = Utilisateur::find($id);

            if($utilisateur)
            {
                $utilisateur->update($data);
            }
            return $utilisateur;
        }

        public function UpdateClientInfo($id,$dataclient)
        {
            $client =  DB::table('client')->where('id_client',$id)->update($dataclient);
          
            return $client;
        }
        public function delete($id)
        {

        }
        public function insert($data)
        {

        }
}