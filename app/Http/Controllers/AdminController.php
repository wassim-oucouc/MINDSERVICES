<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ServiceEditRequest;
use App\Repositories\Contracts\AvisInterface;
use App\Repositories\Contracts\ClientInterface;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Contracts\ServiceInterface;
use App\Repositories\Repository\ClientRepository;
use App\Repositories\Contracts\CategorieInterface;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Contracts\PrestataireInterface;
use App\Repositories\Contracts\ReservationInterface;
use App\Repositories\Contracts\UtilisateurInterface;
use App\Repositories\Repository\CategorieRepository;
use App\Repositories\Repository\PrestataireRepository;
use App\Repositories\Repository\ReservationRepository;
use App\Repositories\Repository\UtilisateurRepository;

class AdminController extends Controller
{
    private $CategorieRepository;
    private $ServiceRepository;
    private $AvisRepository;
    private $UtilisateurRepository;
    private $ClientRepository;
    private $PrestataireRepository;
    private $ReservationRepository;
    public function __construct(CategorieInterface $CategorieRepository, ServiceInterface $ServiceRepository,AvisInterface $AvisRepository,UtilisateurInterface $UtilisateurRepository,ClientInterface $ClientRepository,PrestataireInterface $PrestataireRepository,ReservationInterface $ReservationRepository)
    {
        $this->CategorieRepository =  $CategorieRepository;
        $this->ServiceRepository =  $ServiceRepository;
        $this->AvisRepository = $AvisRepository;
        $this->UtilisateurRepository = $UtilisateurRepository;
        $this->ClientRepository = $ClientRepository;
        $this->PrestataireRepository = $PrestataireRepository;
        $this->ReservationRepository = $ReservationRepository;
    }

    public function IndexHome()
    {
        $statisticusers = $this->UtilisateurRepository->GetStatisticUsers();
        $lastusers = $this->UtilisateurRepository->GetLastUsers();
        $reservations = $this->ReservationRepository->GetLastReservation();
        return view('Admin.Dashboard-home',compact('statisticusers','lastusers','reservations'));
    }

    public function SelectCategories()
    {
        if(!Auth::user()->HasPermission('create_category'))
        {
            abort(403);
        }   
        $StatisticCategrie = $this->CategorieRepository->GetStatisticCategorie();
        $categories = $this->CategorieRepository->ReadCategoriesPaginate();
        $service = $this->ServiceRepository->CountServices();


        return view('Admin.Dashboard-categorie', compact('categories','StatisticCategrie','service'));
    }

    public function CreateCategorie(Request $request)
    {
        if(!Auth::user()->HasPermission('create_category'))
        {
            abort(403);
        }
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
            abort(403);
        }

        return view('Admin.Dashboard-categorie-edit', compact('categories'));
    }

    public function updatecategorie(Request $request)
    {
        if(!Auth::user()->HasPermission('edit_category'))
        {
            abort(403);
        }
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);
        if($request->hasFile('image'))
        {
            $path = $request->image->store('categorie','public');
        $this->CategorieRepository->Update($request->id, [
            'Nom' => $validated['name'],
            'Description' => $validated['description'],
            'Photo' => $path,
        ]);
    }
    else
    {
        $this->CategorieRepository->Update($request->id, [
            'Nom' => $validated['name'],
            'Description' => $validated['description'],
        ]);
    }

    return redirect()->back()->with('success','Categorie bien éte mise a jour');


        return redirect('/admin/categories');
    }

    public function DestroyCategorie(Request $request)
    {
        if(!Auth::user()->HasPermission('delete_category'))
        {
            abort(403);
        }
        $this->CategorieRepository->Delete($request['id']);
        return redirect('/admin/categories');
    }

    public function AddService()
    {
        if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(403);
        }
        $categories = $this->CategorieRepository->ReadCategories();
        return view('Admin.Dashboard-Creation-service', compact('categories'));
    }

    public function CreateService(Request $request)
    {
        if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(403);
        }
        $validated = $request->validate([
            'name' => 'required|string|min:28',
            'description' => 'required|string|min:28',
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
        if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(403);
        }
        $categories = $this->CategorieRepository->ReadCategories();
        $statistic = $this->ServiceRepository->GetStatisticServices();
        $services = $this->ServiceRepository->ReadServices();
        return view('Admin.Dashboard-services', compact('services','categories','statistic'));
    }

    
    public function EditService(ServiceEditRequest $request)
    {
        try
        {
        if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(403);
        }
        $id_admin = Auth::user()->id;
        $categories = $this->CategorieRepository->ReadCategories();
 
            $validated = $request->validated();

            $id_categorie = $this->CategorieRepository->GetIdByName($request->categorie) ?? 0;


           if($request->Hasfile('image'))
           {
            $path = $request->file('image')->store('service', 'public');
            dd($this->ServiceRepository->Update($request->id,[
                'titre' => $validated['name'],
                'Description' => $validated['description'],
                'Photo' => $path,
                'Prix' => $validated['prix'],
                'categorie_id' => $id_categorie,
                'prestataire_id' => Auth::user()->id,
                'created_at' => now(),
                'updated_at' => now(),
                'status' => $request->statut
            ]));
           }
           else
           {
            $this->ServiceRepository->Update($request->id_edit,[
                'titre' => $validated['name'],
                'Description' => $validated['description'],
                'Prix' => $validated['prix'],
                'categorie_id' => $id_categorie[0]['id'],
                'prestataire_id' => Auth::user()->id,
                'updated_at' => now(),
                'status' => $request->statut
            ]);
           }
           return redirect()->back()->with('success','Le service a été mis à jour avec succès');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
         


          
            return redirect()->back()->with('success','Le service a été mis à jour avec succès');
}

    public function DeleteService($id)
    {
        if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(403);
        }
        if (!$id) {
            abort(403);
        }
        $this->ServiceRepository->Delete($id);
        return redirect('/admin/services');
    }

    public function unbanService($id)
    {
        if(!Auth::user()->HasPermission('manage_services'))
    {
        abort(403);
    }
        $this->ServiceRepository->UnbanServiceByID($id);
        return redirect('/admin/services');
    }

    public function BanService($id)
    {
        $this->ServiceRepository->BanServiceByID($id);
        return redirect('/admin/services');
    }

    public function ReservationsIndex()
    {
        $reservation = $this->ReservationRepository->GetReservationsPaginateAdmin();
        return view('Admin.Dashboard-rendez-vous',compact('reservation'));
    }


    public function SelectAvis()
    {
        
    if(!Auth::user()->HasPermission('gestion_avis'))
    {
        abort(403);
    }
        $Avis = $this->AvisRepository->ReadAvis();
        $statistic = $this->AvisRepository->GetStatisticAvisAll();
        // dd($Avis);

        return view('Admin.Dashboard-Avis',compact('Avis','statistic'));
    }

    public function DeleteAvis(Request $request)
    {
        $this->AvisRepository->Delete($request->id);

        return redirect('/admin/avis');


    }

    public function ApproveAvis(Request $request)
    {
        if(!Auth::user()->HasPermission('gestion_avis'))
    {
        abort(403);
    }
        $this->AvisRepository->ApproveAvis($request['id']);
        return redirect('/admin/avis');
        
    }

    public function UpdateAvis(Request $request)
    {
        if(!Auth::user()->HasPermission('gestion_avis'))
    {
        abort(403);
    }
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
        if(!Auth::user()->HasPermission('manage_users'))
    {
        abort(403);
    }
        $statisticusers = $this->UtilisateurRepository->GetStatisticUsers();
       $users = $this->UtilisateurRepository->GetAllUsers();
        return view('Admin.Dashboard-Utilisateurs',compact('users','statisticusers'));
    }

    public function BanUserByid($id)
    {
        if(!Auth::user()->HasPermission('manage_users'))
    {
        abort(403);
    }
        $ban = $this->UtilisateurRepository->BanUser($id);

        return redirect('/admin/utilisateurs');
    }

    public function UbanUserByid($id)
    {
        if(!Auth::user()->HasPermission('manage_users'))
    {
        abort(403);
    }
        $uban = $this->UtilisateurRepository->UnbanUser($id);

        return redirect('/admin/utilisateurs');
    }

    public function DeleteUser(Request $request)
    {
        if(!Auth::user()->HasPermission('manage_users'))
    {
        abort(403);
    }
        if($request->id)
        {
            $user = $this->UtilisateurRepository->Delete($request->id);

            return redirect('admin/utilisateurs');
        }
    }

    public function UpdateUser(Request $request)
    {
        if(!Auth::user()->HasPermission('manage_users'))
    {
        abort(403);
    }
        $validated = $request->validate([
            "lastName" => "required|string",
            "firstName" => "required|string",
            "email" => "required|string|email",
            "phone" => "nullable|string|min:5",
            "image" => "nullable|image",
            "password" => "nullable|string|min:5",
            "passwordConfirm" => "nullable|same:password",
            "Adresse" => "nullable|string|min:5",
            "city" => "nullable|string",
            "postalCode" => "nullable|string",
            "pays" => "nullable|string"
        ]);
    
        $id_user = $request->id_edit;
        $user = $this->UtilisateurRepository->find($id_user);
    
        if ($request->email !== $user->Email) {
            $existuser = $this->UtilisateurRepository->FindByEmail($request->email);
            if ($existuser) {
                return redirect()->back()->with('email', 'The email has already been taken.');
            }
        }
    
        $data = [
            "Prenom" => $request->firstName,
            "Nom" => $request->lastName,
            "Email" => $request->email,
            "Status" => $request->status,
            "updated_at" => now()
        ];
    
        if ($request->password) {
            $data["Password"] = Hash::make($request->password);
        }
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('User', 'public');
            $data["Photo"] = $path;
        }
    
        $this->UtilisateurRepository->UpdateUtilisateur($id_user, $data);
    
        if ($request->role_id == 1) {
            $dataPrestataire = [
                "zip_code" => $request->postalCode,
                "Numero_Telephone" => $request->phone,
                "Adresse" => $request->Adresse,
                "Ville" => $request->city
            ];
            $this->PrestataireRepository->update($id_user, $dataPrestataire);
        } elseif ($request->role_id == 2) {
            $dataclient = [
                "pays" => $request->pays ?? "",
                "telephone" => $request->phone
            ];
            $this->ClientRepository->UpdateClient($id_user,$dataclient);
        }
    
        return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès.');
    }


    public function UpdateAdminDetails(Request $request)
    {
        if(!Auth::user()->HasPermission('edit_information'))
    {
        abort(403);
    }
        $admin_id = Auth::user()->id;

            $validated = $request->validate([
                "first_name" => "required|string|min:6",
                "last_name" => "required|string|min:6",
                "email" => "required|string",
            ]);


            if(Auth::user()->Email != $request->email)
            {
                $user = $this->UtilisateurRepository->FindByEmail($request->email);

                if(!$user)
                {
                    $data = [
                        "Prenom" => $request->first_name,
                        "Nom" => $request->last_name,
                        "Email" => $request->email,
                    ];

                   

                    $this->UtilisateurRepository->UpdateUtilisateur($admin_id,$data);

                    
                return redirect()->back()->with('infosupdated','Vos informations ont été mises à jour avec succès.');
                }
                else
                {
                return redirect()->back()->with('email','Cette adresse e-mail est déjà associée à un compte.');
                }
            }
            else
            {
                
                $data = [
                    "Prenom" => $request->first_name,
                    "Nom" => $request->last_name,
                    "Email" => $request->email,
                ];

               

                $this->UtilisateurRepository->UpdateUtilisateur($admin_id,$data);

                
                return redirect()->back()->with('infosupdated','Vos informations ont été mises à jour avec succès.');
            }
        }
    public function UpdatePassword(Request $request)
    { 
        if(!Auth::user()->HasPermission('edit_information'))
        {
            abort(403);
        }
        $admin_id = Auth::user()->id;
            $request->validate([
                "current_password" => "required|string",
                "new_password" => "required|string|min:6",
                "confirm_password" => "required"
            ]);

            $user = $this->UtilisateurRepository->FindByEmail(Auth::user()->Email);

            $passwordcheck = Hash::check($request->current_password,$user->Password);

            if(!$passwordcheck)
            {
                return redirect()->back()->with('password','Le mot de passe ne correspond pas à notre enregistrement.');
            }
            else
            {
                if($request->new_password != $request->confirm_password)
                {
                    return redirect()->back()->with('password','Confirmation du mot de passe incorrecte.');
                }
                else
                {
                    $newpassword = Hash::make($request->new_password);
                    $this->UtilisateurRepository->UpdateUtilisateur($admin_id,[
                    "Password" => $newpassword
                    ]);

                    return redirect()->back()->with('passwordchanged','Votre mot de passe a été mis à jour avec succès.');
                }
            }
        }
        public function UpdateImage(Request $request)
        {
            if(!Auth::user()->HasPermission('edit_information'))
        {
            abort(403);
        }
            $admin_id = Auth::user()->id;
            $request->validate([
                "profile_image" => "required|image|mimes:jpeg,png,jpg"
            ]);

            if($request->Hasfile('profile_image'))
            {
                $path = $request->file('profile_image')->store('Prestataire','public');
                $this->UtilisateurRepository->UpdateUtilisateur($admin_id,[
                    "Photo" => $path
                ]);

                return redirect()->back()->with('imagechanged','Votre photo de profil a été mise à jour avec succès.');
            }
    }

    public function CancelReservation(Request $request, $id)
    {
        $this->ReservationRepository->CancelReservation($id);
        return redirect('/admin/rendez-vous');
    }

    public function UpdateReservationDetailsAdmin(Request $request)
    {
        $reservation_id = $request->reservation_id;
        $service_id = $request->service_id;

        $reservation = $this->ReservationRepository->FindReservationByDateAndTime($request->new_date,$request->time,$service_id);

        if($reservation)
        {
            return redirect('/admin/rendez-vous')->with('error',"La date et l'heure sélectionnées pour ce service sont déjà réservées. Veuillez choisir un autre créneau disponible");
        }
        else
        {

        $updatereservation = $this->ReservationRepository->update($reservation_id,[
            "reservation_date" => $request->new_date,
            "reservation_time" => $request->time
        ]);

        return redirect('/admin/rendez-vous')->with('modifier','La modification a été effectuée avec succès.');
    }



    }

    public function DeleteReservation(Request $request,$id)
    {
        $reservation = $this->ReservationRepository->DeleteReservationByID($id);

        return redirect('/admin/rendez-vous');
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



