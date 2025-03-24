<?php


namespace  App\Repositories\Repository;


use App\Models\Service;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\ServiceInterface;


class ServiceRepository
{


public function find($id)
{
    $Service = Service::find($id);
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
}

