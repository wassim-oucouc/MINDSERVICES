<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Repository\CategorieRepository;

class AdminController extends Controller
{
    private $CategorieRepository;
    private $ServiceRepository;
    private $AvisRepository;

    public function __construct(CategorieRepository $CategorieRepository, ServiceRepository $ServiceRepository,AvisRepository $AvisRepository)
    {
        $this->CategorieRepository =  $CategorieRepository;
        $this->ServiceRepository =  $ServiceRepository;
        $this->AvisRepository = $AvisRepository;
    }

    public function SelectCategories()
    {
        $categories = $this->CategorieRepository->ReadCategories();
        return view('Admin.Dashboard-categorie', compact('categories'));
    }

    public function CreateCategorie(Request $request)
    {
        $validated = $request->validate([
            'categoryName' => 'required|string',
            'categoryDescription' => 'required|string',
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('categorie', 'public');

        $this->CategorieRepository->create([
            'Nom' => $validated['categoryName'],
            'Description' => $validated['categoryDescription'],
            'Photo' => $path,
        ]);

        return redirect('/admin/categories');
    }

    public function update($id)
    {
        $categories = $this->CategorieRepository->find($id);

        if (!$categories) {
            abort(404);
        }

        return view('Admin.Dashboard-categorie-edit', compact('categories'));
    }

    public function updatecategorie(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);

        $this->CategorieRepository->Update($id, [
            'Nom' => $validated['name'],
            'Description' => $validated['description'],
            'Photo' => $validated['image'],
        ]);

        return redirect('/admin/categories');
    }

    public function DestroyCategorie(Request $request)
    {
        $this->CategorieRepository->Delete($request['id']);
        return redirect('/admin/categories');
    }

    public function AddService()
    {
        $categories = $this->CategorieRepository->ReadCategories();
        return view('Admin.Dashboard-Creation-service', compact('categories'));
    }

    public function CreateService(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required',
            'image' => 'required|image',
            'statut' => 'required',
            'categorie' => 'required',
        ]);

        $path = $request->file('image')->store('service', 'public');
        $categorieid = $this->CategorieRepository->GetIdByName($validated['categorie']);
        $id = $categorieid[0]['id'] ?? 0;

        $this->ServiceRepository->create([
            'titre' => $validated['name'],
            'Description' => $validated['description'],
            'Photo' => $path,
            'Prix' => $validated['prix'],
            'prestataire_id' => Auth::user()->id,
            'categorie_id' => $id,
            'created_at' => now(),
            'updated_at' => now(),
            'status' => $validated['statut'],
        ]);

        return redirect('/admin/services');
    }

    public function SelectServices()
    {
        $services = $this->ServiceRepository->ReadServices();
        return view('Admin.Dashboard-services', compact('services'));
    }

    public function UpdateService($id)
    {
        $services = $this->ServiceRepository->GetServiceByID($id);
        $categories = $this->CategorieRepository->ReadCategories();

        return view('Admin.Dashboard-Modification-service', compact('services', 'categories'));
    }

    public function EditService(Request $request, $id)
    {
        if ($request->name) {
            $validated = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'prix' => 'required',
                'categorie' => 'required',
                'image' => 'required',
                'statut' => 'required',
            ]);

            $path = $request->file('image')->store('service', 'public');
            $id_categorie = $this->CategorieRepository->GetIdByName($request->categorie)[0]->id ?? 0;

            $this->ServiceRepository->Update($id, [
                'titre' => $validated['name'],
                'Description' => $validated['description'],
                'Photo' => $path,
                'Prix' => $validated['prix'],
                'categorie_id' => $id_categorie,
                'prestataire_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
                'status' => $validated['statut'],
            ]);
        }

        return redirect('/admin/services');
    }

    public function DeleteService($id)
    {
        if (!$id) {
            abort(404);
        }
        $this->ServiceRepository->Delete($id);
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


    public function SelectAvis()
    {
        $Avis = $this->AvisRepository->ReadAvis();
        // dd($Avis);

        return view('Admin.Dashboard-Avis',compact('Avis'));
    }

    public function DeleteAvis(Request $request)
    {
        $this->AvisRepository->Delete($request->id);

        return redirect('/admin/avis');


    }

    public function ApproveAvis(Request $request)
    {
        
        $this->AvisRepository->ApproveAvis($request['id']);
        return redirect('/admin/avis');
        
    }

    public function UpdateAvis(Request $request)
    {
        $Avis = Avis::with('Prestataire','Client')->findOrfail($request->id);
        if($request->Note)
        {
        $validated = $request->validate([
            "Note" => "required",
            "Commentaire" => "required|string|min:6",
            "status" => "required"
        ]);
    
            $this->AvisRepository->Update($request->id,[
                "Note" => $validated['Note'],
                "Commentaire" => $validated['Commentaire'],
                "status" => $validated['status']
            ]);

            return redirect('/admin/avis');
        }

        return view('Admin.Dashboard-Modification-avis',compact('Avis'));
    }
}
