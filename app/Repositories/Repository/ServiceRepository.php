<?php


namespace  App\Repositories\Repository;


use App\Models\Service;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\ServiceInterface;


class ServiceRepository implements ServiceInterface
{


public function find($id)
{
    $service = Service::where('id',$id)->with('Prestataire')->first();
    return $service;
}
public function Update($id,array $data)
{
     $service = Service::find($id);
     if (!$service) {
         return false;  
     }
 
     $updateservice = $service->update($data);

     return $updateservice;
}
public function Delete($id)
{
    $deleteservice = Service::find($id);
    if($deleteservice)
    {
    $deleteservice->delete();
    }
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
    ->join('categorie','categorie.id','=','service.categorie_id')
    ->select('Utilisateur.Prenom','Utilisateur.Nom','Utilisateur.Photo AS ProfilePhoto',
    'categorie.Nom AS CategorieNom','Service.titre','Service.duration','Service.availability','Service.Description','Service.Photo',
    'Service.Prix','Service.created_at','Service.id','Service.updated_at','Service.status')
    ->paginate(5);
    return $services;
}

public function GetServiceByID($id)
{
    $service = Service::where('id',$id)->with('category','Prestataire')->first();

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
    $service = Service::where('id',$id)->where('status','Actif')->with('Prestataire','Professional','category')->first();

    return $service;
}

public function GetServicesWithPaginate($id)
{
    $services = Service::where('prestataire_id',$id)->where('status','Actif')->paginate(5);

    return $services;
}

public function getserviceslimit()
{
    $services = Service::limit(4)->get();
    return $services;
}

public function GetServicesAll()
{
    $services = Service::with('Category','Professional')->withCount(['Avis' => function($avis){
        $avis->where('status','Approuvé');
    }])->withAvg(['Avis' => function($avis){
        $avis->where('status','Approuvé');
    }],'Note')
    ->where('status','Actif')
    ->paginate(5);

    return $services;
}

public function GetServicesByCategorieID($id)
{
    $services = Service::with('Category','Professional','Avis')->withCount(['Avis' => function($avis){
        $avis->where('status','Approuvé');
    }])->withAvg('Avis','Note')->paginate(10);

    return $services;
}



public function GetStatisticServices()
{
    $totalservices = Service::count();

    $ActifServices = Service::where('status','Actif')->count();

    $InactifServices = Service::where('status','Inactif')->count();

    $statistic = [
        "totalservices" => $totalservices,
        "ActifServices" =>  $ActifServices,
        "InactifServices" => $InactifServices
    ];

    return $statistic;
}


public function CountServices()
{
    $total = Service::all()->count();

    return $total;
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

   return $service->sortBy('Prix')->values();

}

public function GetServicesbycategorieDesc($array)
{
    $service = $this->GetServicebycategorie($array);

    return $service->sortByDesc('Prix')->values();

}

public function GetServiceActif($id)
{
    $service = Service::where('prestataire_id',$id)->where('status','Actif')->count();

    return $service;
}

public function GetServicesByPrestataire($id)
{
    $services = DB::table('service')
    ->join('utilisateur','utilisateur.id','=','service.prestataire_id')
    ->join('categorie','Categorie.id','=','service.categorie_id')
    ->where('service.prestataire_id','=',$id)
    ->where('service.status','Actif')
    ->select('utilisateur.Prenom','utilisateur.Nom','utilisateur.Photo AS ProfilePhoto',
    'categorie.Nom AS CategorieNom','service.titre','service.duration','service.availability','service.Description','service.Photo',
    'service.Prix','service.created_at','service.id','service.updated_at','service.status')
    ->paginate(5);

    return $services;
}

public function statisticServiceByPrestataire($id)
{
    $totalservices = Service::where('prestataire_id',$id)->count();

    $totalservicesactif = Service::where('prestataire_id',$id)->where('status','Actif')->count();

    $totalserviceInactif = Service::where('prestataire_id',$id)->where('status','inactif')->count();

    $statistic = [
        "total" => $totalservices,
        "totalactif" => $totalservicesactif,
        "totalinactif" => $totalserviceInactif
    ];

    return $statistic;
}

public function GetServiceBycategorieId($id)
{
    $services = Service::where('categorie_id',$id)->with('category')->paginate(10);

    return $services;
}



}

