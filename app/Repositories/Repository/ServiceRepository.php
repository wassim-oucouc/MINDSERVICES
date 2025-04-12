<?php


namespace  App\Repositories\Repository;


use App\Models\Service;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\ServiceInterface;


class ServiceRepository implements ServiceInterface
{


public function find($id)
{
    $service = Service::findOrfail($id);
    return $service;
}
public function Update($id,array $data)
{
    $updateservice = Service::where('id',$id)->update($data);
  
    return $updateservice;
}
public function Delete($id)
{
    $deleteservice = Service::find($id);
    $deleteservice->delete();
    return $deleteservice;
}
public function create(array $data)
{
    $service = Service::create($data);
    return $service;
}

public function ReadServices()
{
    $services = DB::table('service')
    ->join('Utilisateur','Utilisateur.id','=','service.prestataire_id')
    ->join('categorie','Categorie.id','=','service.categorie_id')
    ->select('Utilisateur.Prenom','Utilisateur.Nom','Utilisateur.Photo AS ProfilePhoto',
    'categorie.Nom AS CategorieNom','Service.titre','Service.Description','Service.Photo',
    'Service.Prix','Service.created_at','Service.id','Service.updated_at','Service.status')
    ->get();
    return $services;
}

public function GetServiceByID($id)
{
    $service = Service::find($id);

    return $service;
}

public function UnbanServiceByID($id)
{
    $service = Service::find($id);

    $service->status = "Actif";
    $service->save();

    return $service;
}

public function BanServiceByID($id)
{
    $service = Service::find($id);

    $service->status = "Inactif";
    $service->save();

    return $service;
}

public function GetServiceDetails($id)
{
    $service = Service::where('id',$id)->with('Prestataire','Professional','category')->first();

    return $service;
}

public function GetServicesWithPaginate($id)
{
    $services = Service::where('prestataire_id',$id)->where('status','Actif')->paginate(5);

    return $services;
}

public function GetServicesAll()
{
    $services = Service::with('Category','Professional')->withCount(['Avis' => function($avis){
        $avis->where('status','Approuvé');
    }])->withAvg(['Avis' => function($avis){
        $avis->where('status','Approuvé');
    }],'Note')->paginate(5);

    return $services;
}

public function GetServiceByNameCity($Name,$City)
{
$Service = DB::table('Service')
->Join('prestataire','Service.prestataire_id','=','prestataire.utilisateur_id')
->leftJoin('avis','avis.service_id','=','Service.id')
->Join('categorie','service.categorie_id','=','categorie.id')
->where('prestataire.Ville',$City)
->where('Service.titre','LIKE',substr($Name,0,3).'%')
->where('Service.status','Actif')
->select('Service.id','Service.titre','prestataire.Ville','prestataire.zip_code','categorie.Nom','Service.Description','Service.Photo','Service.Prix','Service.duration','Service.availability','Service.categorie_id','Service.prestataire_id','Service.created_at','Service.updated_at','Service.status',
db::raw('COUNT(avis.Note) AS note_count'),
db::raw('AVG(avis.Note) AS Note_avg'),'prestataire.Ville','prestataire.zip_code','categorie.Nom AS categorieNom')
->groupby('Service.id','Service.titre','prestataire.Ville','prestataire.zip_code','categorie.Nom','Service.Description','Service.Photo','Service.Prix','Service.duration','Service.availability','Service.categorie_id','Service.prestataire_id','Service.created_at','Service.updated_at','Service.status')
->get();

return $Service;
}

public function GetServicebycategorie($array)
{
    $query = Service::join('Categorie','categorie.id','=','service.categorie_id')
    ->leftJoin('avis','avis.service_id','=','Service.id')
    ->join('prestataire', 'prestataire.id', '=', 'service.prestataire_id')
->select('prestataire.Ville','categorie.Nom AS categorieNom','Service.id','Service.titre','prestataire.zip_code','Service.Description','Service.Photo','Service.Prix','Service.duration','Service.availability','Service.categorie_id','Service.prestataire_id','Service.created_at','Service.updated_at','Service.status',
db::raw('COUNT(avis.Note) AS note_count'),
db::raw('AVG(avis.Note) AS Note_avg'))
->where('Service.status','Actif')
->whereIn('Categorie.Nom',$array)
->groupby('Service.id','Service.titre','prestataire.Ville','prestataire.zip_code','categorie.Nom','Service.Description','Service.Photo','Service.Prix','Service.duration','Service.availability','Service.categorie_id','Service.prestataire_id','Service.created_at','Service.updated_at','Service.status')
->get();

    return $query;

}

public function GetServiceWithPriceDesc()
{
    $query = Service::join('Categorie','categorie.id','=','service.categorie_id')
    ->leftJoin('avis','avis.service_id','=','Service.id')
    ->join('prestataire', 'prestataire.id', '=', 'service.prestataire_id')
->select('prestataire.Ville','categorie.Nom AS categorieNom','Service.id','Service.titre','prestataire.zip_code','Service.Description','Service.Photo','Service.Prix','Service.duration','Service.availability','Service.categorie_id','Service.prestataire_id','Service.created_at','Service.updated_at','Service.status',
db::raw('COUNT(avis.Note) AS note_count'),
db::raw('AVG(avis.Note) AS Note_avg'))
->where('Service.status','Actif')
->groupby('Service.id','Service.titre','prestataire.Ville','prestataire.zip_code','categorie.Nom','Service.Description','Service.Photo','Service.Prix','Service.duration','Service.availability','Service.categorie_id','Service.prestataire_id','Service.created_at','Service.updated_at','Service.status')
->orderBy('Service.Prix','desc')
->get();

return $query;
}

public function GetServiceWithPriceAsc()
{
    $query = Service::join('Categorie','categorie.id','=','service.categorie_id')
    ->leftJoin('avis','avis.service_id','=','Service.id')
    ->join('prestataire', 'prestataire.id', '=', 'service.prestataire_id')
->select('prestataire.Ville','categorie.Nom AS categorieNom','Service.id','Service.titre','prestataire.zip_code','Service.Description','Service.Photo','Service.Prix','Service.duration','Service.availability','Service.categorie_id','Service.prestataire_id','Service.created_at','Service.updated_at','Service.status',
db::raw('COUNT(avis.Note) AS note_count'),
db::raw('AVG(avis.Note) AS Note_avg'))
->where('Service.status','Actif')
->groupby('Service.id','Service.titre','prestataire.Ville','prestataire.zip_code','categorie.Nom','Service.Description','Service.Photo','Service.Prix','Service.duration','Service.availability','Service.categorie_id','Service.prestataire_id','Service.created_at','Service.updated_at','Service.status')
->orderBy('Service.Prix','asc')
->get();

return $query;
}

public function GetServicesbycategorieAsc($array)
{
    $service = $this->GetServicebycategorie($array);

   return $service->sortBy('Prix');

}

public function GetServicesbycategorieDesc($array)
{
    $service = $this->GetServicebycategorie($array);

    return $service->sortByDesc('Prix');

}




}

