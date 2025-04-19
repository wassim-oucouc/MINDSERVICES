<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\AvisInterface;
use App\Repositories\Contracts\ClientInterface;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Contracts\ServiceInterface;
use App\Repositories\Repository\ClientRepository;
use App\Repositories\Contracts\CategorieInterface;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Contracts\PrestataireInterface;
use App\Repositories\Contracts\UtilisateurInterface;
use App\Repositories\Repository\CategorieRepository;
use App\Repositories\Repository\PrestataireRepository;

class AdminController extends Controller
{
    private $CategorieRepository;
    private $ServiceRepository;
    private $AvisRepository;
    private $UtilisateurRepository;
    private $ClientRepository;
    private $PrestataireRepository;

    public function __construct(CategorieInterface $CategorieRepository, ServiceInterface $ServiceRepository,AvisInterface $AvisRepository,UtilisateurInterface $UtilisateurRepository,ClientInterface $ClientRepository,PrestataireInterface $PrestataireRepository)
    {
        $this->CategorieRepository =  $CategorieRepository;
        $this->ServiceRepository =  $ServiceRepository;
        $this->AvisRepository = $AvisRepository;
        $this->UtilisateurRepository = $UtilisateurRepository;
        $this->ClientRepository = $ClientRepository;
        $this->PrestataireRepository = $PrestataireRepository;
    }

    public function SelectCategories()
    {
        $categories = $this->CategorieRepository->ReadCategoriesPaginate();
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
            'image' => 'required',
            'statut' => 'required',
            'categorie' => 'required',
            "duration" => "required",
            "availability" => "required"
        ]);

        $path = $request->file('image')->store('service', 'public');
        $categorieid = $this->CategorieRepository->GetIdByName($request->categorie);
        $id = $categorieid['0']['id'] ?? 0;
        $this->ServiceRepository->create([
            'titre' => $validated['name'],
            'Description' => $validated['description'],
            'Photo' => $path,
            'Prix' => $validated['prix'],
            "duration" => $validated['duration'],
            "availability" => $validated['availability'],
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

    
    public function EditService(Request $request,$id)
    {
        $services = $this->ServiceRepository->GetServiceByID($id);
        $categories = $this->CategorieRepository->ReadCategories();
        if($request->name)
        {
            $validated = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'prix' => 'required',
                'categorie' => 'required',
                'image' => 'required',
                'statut' => 'required',
            ]);

            $path = $request->file('image')->store('service', 'public');
            $id_categorie = $this->CategorieRepository->GetIdByName($request->categorie->id);

            $this->ServiceRepository->Update($id,[
                'titre' => $validated['name'],
                'Description' => $validated['description'],
                'Photo' => $path,
                'Prix' => $validated['prix'],
                'categorie_id' => $id_categorie,
                'prestataire_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
                'status' => $validated['statut']
            ]);
        }
            return view('Admin.Dashboard-Modification-service', compact('services', 'categories'));        
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
            "Commentaire" => "required|string",
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


    public function UtilisateurIndex()
    {
       $users = $this->UtilisateurRepository->GetAllUsers();
        return view('Admin.Dashboard-Utilisateurs',compact('users'));
    }

    public function DeleteUser(Request $request)
    {
        if($request->id)
        {
            $user = $this->UtilisateurRepository->Delete($request->id);

            return redirect('admin/utilisateurs');
        }
    }

    public function UpdateUser(Request $request)
    {
        $user = $this->UtilisateurRepository->findUser($request->id);
    
        if ($request->lastName){
            
            $validated = $request->validate([
                "lastName" => "required|string",
                "firstName" => "required|string",
                "email" => "required|string|email|unique:utilisateur"
            ]);
            $data = [
                "Prenom" => $request["firstName"],
                "Nom" => $request["lastName"],
                "Status" => $request["status"],
                "updated_at" => now()
            ];
    
            if ($request["password"] && $request["passwordConfirm"]) {
                if ($request["password"] === $request["passwordConfirm"]){
                    $data["Password"] = Hash::make($request["password"]);
                } else {
                    return back()->withErrors(['passwordConfirm' => 'Les mots de passe ne correspondent pas.']);
                }
            }
    
            if ($request->hasFile('image')){
                $path = $request->file('image')->store('User', 'public');
                $data["Photo"] = $path;
            }
    
            $this->UtilisateurRepository->UpdateUtilisateur($request->id,$data);
    
            if ($request->Role === "prestataire"){
                $dataPrestataire = [
                    "zip_code" => $request["postalCode"],
                    "Numero_Telephone" => $request["phone"],
                    "Adresse" => $request["Adresse"],
                    "Ville" => $request["city"]
                ];
                $this->PrestataireRepository->update($request->id,$dataPrestataire);
            } elseif ($request->Role === "client") {
                $dataClient = [
                    "pays" => $request["pays"] ?? "",
                    "telephone" => $request["phone"]
                ];
                $this->ClientRepository->update($request->id,$dataClient);
            }
    
            return redirect('/admin/utilisateurs')->with('success','mis à jour avec succès');
            
        }
    
        return view('Admin.Dashboard-Modification-utilisateurs', compact('user'));
    }
    

    public function CheckRole($role)
    {
        $id = 0;
        if($role == 'admin')
        {
            $id = 3;
        }
        else if($role == 'client')
        {
            $id = 2;
        }
        else if($role == 'prestataire')
        {
            $id = 1;
        }
        return $id;
    }
}



