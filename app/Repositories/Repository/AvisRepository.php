<?php

namespace  App\Repositories\Repository;


use App\Models\Avis;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\AvisInterface;


class AvisRepository implements AvisInterface
{
    public function find($id)
    {
        $Avis = Avis::find($id);
        return $Avis;
    }
    public function Update($id,array $data)
    {
       $avis = Avis::where('id',$id)->update($data);

       return $avis;
    }
    public function Delete($id)
    {
        $avis = Avis::find($id);
        if(!$id)
        {
            abort(404);
        }
        else
        {
            $avis->Delete();
            return $avis;
        }

    }
    public function create(array $data)
    {

    }
    public function ReadAvis()
    {
        $Avis = Avis::select('Professional.Prenom AS ProfessionalPrenom','avis.Note','avis.id','avis.status','Professional.Nom AS ProfessionalNom','Professional.Photo AS ProfessionalPhoto','Client.Prenom AS ClientPrenom','Client.Nom AS ClientNom','Client.Photo AS ClientPhoto','avis.Note','avis.Commentaire','service.titre')
        ->join('service', 'service.id','=','avis.Service_id')
        ->join('utilisateur AS Client','Client.id', '=','avis.client_id')
        ->join('utilisateur AS Professional', 'Professional.id','=','avis.prestataire_id')
        ->get();

        return $Avis;
    }

    public function ApproveAvis($id)
    {
       $avis =  Avis::find($id);

        if($avis)
        {
            $avis->status = "Approuvé";
            $avis->save();
        }
    }
}
