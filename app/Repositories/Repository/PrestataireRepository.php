<?php
namespace App\Repositories\Repository;

use App\Models\Prestataire;
use App\Repositories\Contracts\PrestataireInterface;



class PrestataireRepository implements PrestataireInterface
{
    public function find($id)
    {

    }
    public function update($id,$data)
    {
      $Prestataire = Prestataire::where('utilisateur_id',$id)->update($data);

      return $Prestataire;

    }
    public function delete($id)
    {

    }
    public function insert($data)
    {

    }

    public function GetDetailsPrestataire($id)
    {
      $PrestataireDetails =   Prestataire::where('utilisateur_id',$id)->with(['Service.category' => function($service){
        $service->limit(4);
      },'Utilisateur','Avis.Client','Service' => function($service){
        $service->where('status','Actif');
      }])->first();

      return $PrestataireDetails;
    }
}