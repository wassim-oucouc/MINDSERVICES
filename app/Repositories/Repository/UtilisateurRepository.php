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
    public function Update($id,array $data)
    {
        $user  = Utilisateur::find($id);
        $user->update($data);

        return $user;
    }
    public function Delete($id)
    {
        $user = Utilisateur::find($id);
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
}


?>