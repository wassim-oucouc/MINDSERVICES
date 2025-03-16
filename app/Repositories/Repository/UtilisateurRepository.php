<?php

namespace  App\Repositories\Repository;

use App\Models\Client;
use App\Models\prestataire;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\BaseRepositoryInterface;



class UtilisateurRepository implements BaseRepositoryInterface
{
    public function find($id)
    {
        $users = Utilisateur::find($id);
        return $users;
    }
    public function Update($id,array $data)
    {
        $user  = Utilisateur::find($id);
        $user->update();

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

    public function InsertProfessional(array $datauser,array $dataprestataire)
    {
       
        $id = DB::table('utilisateur')->insertGetId($datauser);

         $dataprestataire['utilisateur_id'] = $id;

      
        prestataire::create($dataprestataire);
    }
}


?>