<?php

namespace  App\Repositories\Repository;

use App\Models\Client;
use App\Models\prestataire;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\UtilisateurInterface;



class UtilisateurRepository implements UtilisateurInterface
{
    public function find($id)
    {
        $users = Utilisateur::find($id);
        return $users;
    }

    public function findUser($id)
    {
        $users = Utilisateur::find($id)->with('Role','Professional','Client')->first();
        return $users;
    }
    public function UpdateUtilisateur($id,$data)
    {
        $user  = Utilisateur::findOrfail($id);
        $user->update($data);

        return $user;
    }
    public function Delete($id)
    {
        $user = Utilisateur::findOrfail($id);
        $user->delete();
        return $user;

    }
    public function Insert(array $data,array $dataclient)
    {

        $id = DB::table('utilisateur')->insertGetId($data);

        $dataclient['id_client'] = $id;
        Client::create($dataclient);

    }

    public function create(array $data)
    {

    }
    public function InsertProfessional(array $datauser,array $dataprestataire)
    {
       
        $id = DB::table('utilisateur')->insertGetId($datauser);

         $dataprestataire['utilisateur_id'] = $id;

      
        prestataire::create($dataprestataire);
    }

    public function FindByEmail($email)
    {
        return Utilisateur::where('Email',$email)->first();
    }

    public function GetAllUsers()
    {
        $users = Utilisateur::with('Client','Professional','Role')->paginate(5);

        return $users;
    }

    public function BanUser($id)
    {
        $user = Utilisateur::find($id);

        $user->Status = 'Suspendu';

        $user->save();
    }

    public function UnbanUser($id)
    {
        $user = Utilisateur::find($id);
        $user->Status = 'Active';
        $user->save();
    }

    public function GetStatisticUsers()
    {
        $totaluser = Utilisateur::all()->count();
        $totalprestataire = Utilisateur::where('role_id',1)->count();
        $totalclients = Utilisateur::where('role_id',2)->count();
        $totalusersbanni = Utilisateur::where('Status','Suspendu')->count();

        return $statistic = [
            "totalusers" => $totaluser,
            "totalprestataire" => $totalprestataire,
            "totalclients" => $totalclients,
            "totalusersbanni" => $totalusersbanni
        ];
    }

    public function GetLastUsers()
    {
        $users = Utilisateur::with('Role')->latest()->limit(5)->get();

        return $users;
    }
}


?>