<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Repository\CategorieRepository;

class AdminController extends Controller
{
    Private $CategorieRepository;
    Private $ServiceRepository;

    public function __construct(CategorieRepository $CategorieRepository,ServiceRepository $ServiceRepository)
    {
        $this->CategorieRepository =  CategorieRepository();
        $this->ServiceRepository =  ServiceRepository();
    }

    public function SelectCategories()
    {
        $categories = $this->CategorieRepository->ReadCategories();

        // dd($categories);
            return view('Admin.Dashboard-categorie',compact('categories'));
    }
    public function CreateCategorie(Request $request)
    {
        $validated = $request->validate([
            "categoryName" => "required|string",
            "categoryDescription" => "required|string",
            "image" => "required|image",
        ]);

        if($request->file('image'))
        {
       $path =  $request->file('image')->store('categorie','public');
        }

        $this->CategorieRepository->create([
          "Nom" =>  $validated['categoryName'],
          "Description" =>  $validated['categoryDescription'],
            'Photo' => $path,
        ]);
        return redirect('/admin/categories');
    }
    public function update($id)
    {
        
        $categories = $this->CategorieRepository->find($id);

        if(!$categories)
        {
            abort(404);
        }
        // dd($categories);
        return view('Admin.Dashboard-categorie-edit',compact('categories'));  
    }

    public function updatecategorie(Request $request,$id)
    {
        
        $validate = $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            "image" => "required|image",
        ]);

        $this->CategorieRepository->Update($id,
    [
        "Nom" => $validate['name'],
        "Description" => $validate['description'],
        "Photo" => $validate['image'],
    ]);

        return redirect('/admin/categories');
        // dd($request,$id);
        return view('Admin.Dashboard-categorie-edit');  
}


// public function DeleteCategorie($id)
// {
//     dd($id); 
// }


public function DestroyCategorie(Request $request)
{
    $this->CategorieRepository->Delete($request['id']);
    return redirect('/admin/categories');

}

public function AddService()
{
    $categories = $this->CategorieRepository->ReadCategories();
    return view('Admin.Dashboard-Creation-service',compact('categories'));
}


public function CreateService(Request $request)
{
    $categories = $this->CategorieRepository->ReadCategories();
    $validate = $request->validate([
        "name" => "required|string",
        "description" => "required|string",
        "prix" => "required",
        "image" => "required|image",
        "statut" => "required",
        "categorie" => "required",
    ]);

    if($request->file('image'))
    {
        $path = $request->file('image')->store('service','public');
        // dd($path);
    }

    $categorieid = $this->CategorieRepository->GetIdByName($validate['categorie']);
    $id = 0;

    foreach($categorieid as $value)
    {
       $id =  $value['id'];
    }
    $this->ServiceRepository->create([
        "titre" => $validate['name'],
        "Description" => $validate['description'],
        "Photo" => $path,
        "Prix" => $validate['prix'],
        "prestataire_id" => 21,
        "categorie_id" => $id,
        "created_at" => now(),
        "updated_at" => now(),
        "status" => $validate['statut'],
    ]);

    return redirect('/admin/services');


    return view('Admin.Dashboard-Creation-service',compact('categories'));
}

public function SelectServices()
{
    $services =  $this->ServiceRepository->ReadServices();
    // dd($services);
    return view('Admin.Dashboard-services',compact('services'));
}


public function UpdateService($id)
{
    $services = $this->ServiceRepository->GetServiceByID($id);
    $categories  =  $this->CategorieRepository->ReadCategories();

    return view('Admin.Dashboard-Modification-service',compact('services','categories'));
}

public function EditService(Request $request,$id)
{
    
if($request->name)
{
  $validate =   $request->validate([
        "name" => "required",
        "description" => "required",
        "prix" => "required",
        "categorie" => "required",
        "image" => "required",
        "statut" => "required",
    ]);

    if($request->file('image'))
    {
        $path = $request->file('image')->store('service','public');
    }
        $id_categorie = 0;
    $id_get = $this->CategorieRepository->GetIdByName($request->categorie);
    foreach($id_get as $value)
    {
        
        $id_categorie =  $value->id ;
    }
    $update = $this->ServiceRepository->Update($id,[
        "titre" => $request->name,
        "Description" => $request->description,
        "Photo" => $path,
        "Prix" => $request->prix,
        "categorie_id" => $id_categorie,
        "prestataire_id" => 17,
        "created_at" => now(),
        "updated_at" => now(),
        "status" => $request->statut
    ]);
    return redirect('/admin/services');
    }


    $services = $this->ServiceRepository->GetServiceByID($id);
    $categories  =  $this->CategorieRepository->ReadCategories();

    return view('Admin.Dashboard-Modification-service',compact('services','categories'));
   
}

public function DeleteService($id)
{
    if(!$id)
    {
        abort(404);
    }
    $deleteService = $this->ServiceRepository->Delete($id);

    return redirect('/admin/services');
}

public function unbanService($id)
{
    $this->ServiceRepository->UnbanServiceByID($id);

    return redirect('/admin/services');
}

public function BanService($id)
{
    $this->ServiceRepository->BanServiceByID($id);

    return redirect('/admin/services');
}

public function Rendez_vous()
{
return view('Admin.Dashboard-rendez-vous');
}
}