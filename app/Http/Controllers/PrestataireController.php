<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\AvisInterface;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Contracts\ServiceInterface;
use App\Repositories\Contracts\CategorieInterface;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Contracts\PrestataireInterface;
use App\Repositories\Contracts\ReservationInterface;
use App\Repositories\Contracts\UtilisateurInterface;
use App\Repositories\Repository\CategorieRepository;
use App\Repositories\Repository\PrestataireRepository;
use App\Repositories\Repository\ReservationRepository;
use App\Repositories\Repository\UtilisateurRepository;

class PrestataireController extends Controller
{
    Private $PrestataireRepository;
    private $AvisRepository;
    private $ReservationRepository;
    private $ServiceRepository;
    private $CategorieRepository;
    private $UtilisateurRepository;
    public function __construct(AvisInterface $AvisRepository,PrestataireInterface $PrestataireRepository,ReservationInterface $ReservationRepository,ServiceInterface $ServiceRepository,CategorieInterface $CategorieRepository,UtilisateurInterface $UtilisateurRepository)
    {
        $this->PrestataireRepository = $PrestataireRepository;
        $this->AvisRepository = $AvisRepository;
        $this->ReservationRepository = $ReservationRepository;
        $this->ServiceRepository = $ServiceRepository;
        $this->CategorieRepository = $CategorieRepository;
        $this->UtilisateurRepository = $UtilisateurRepository;
    }
    public function IndexHome()
    {   
        
        $id_prestataire = Auth::user()->id;
       $avis =  $this->AvisRepository->GetFeedbackLimit($id_prestataire);
       $statistic = $this->AvisRepository->getstatisticbyprestataire($id_prestataire);
       $reservation = $this->ReservationRepository->GetReservationsPaginate($id_prestataire);
       $totalReservationPending = $this->ReservationRepository->CountReservationEncours($id_prestataire);
       $totalServiceActif = $this->ServiceRepository->GetServiceActif($id_prestataire);
       $totalReservationTerminer = $this->ReservationRepository->GetReservationsTerminer($id_prestataire);

       $totals = [
        "totalReservationPending" => $totalReservationPending,
        "totalServiceActif" => $totalServiceActif,
        "totalReservationTerminer" => $totalReservationTerminer
       ];
       
        return view('Prestataire.Dashboard-Home',compact('avis','reservation','totals','statistic'));
    }


    public function IndexServices()
    {
        if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(404);
        }
        $id_prestataire = Auth::user()->id;
        $statistic = $this->ServiceRepository->statisticServiceByPrestataire($id_prestataire);
        $services = $this->ServiceRepository->GetServicesByPrestataire($id_prestataire);
        $categories = $this->CategorieRepository->ReadCategories();
        return view('Prestataire.Dashboard-services',compact('services','statistic','categories'));
    }


    public function IndexServiceCreation()
    {
        if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(404);
        }
        $categories = $this->CategorieRepository->ReadCategories();
        return view('Prestataire.Dashboard-Creation-service',compact('categories'));
    }

    public function ServiceCreation(Request $request)
    {
        if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(404);
        }
        $validated = $request->validate([
            'name' => 'required|string|min:28',
            'description' => 'required|string|min:28',
            'prix' => 'required',
            'image' => 'nullable|image',
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
            "status" => "Actif",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/professional/services');
    }


    

        public function EditService(Request $request)
        {
            if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(404);
        }
                $validated = $request->validate([
                    'name' => 'required|string',
                    'description' => 'required|string|min:20',
                    'prix' => 'required|string',
                    'categorie' => 'required|string',
                    "availability" => "required|string",
                    "duration" => "required",
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
                ]);

                $id = $request->id_edit;

                if($request->hasFile('image'))
                {
                $path = $request->file('image')->store('service','public');
                $service = $this->ServiceRepository->Update($id,[
                    'titre' => $validated['name'],
                    'Description' => $validated['description'],
                    "duration" => $validated['duration'],
                    "availability" => $validated['availability'],
                     'Photo' => $path,
                    'Prix' => $validated['prix'],
                    'categorie_id' => $id_categorie[0]['id'],
                    'updated_at' => now(),
                ]);
                }
                $id_categorie = $this->CategorieRepository->GetIdByName($validated['categorie']) ?? 0;


                $service = $this->ServiceRepository->Update($id,[
                    'titre' => $validated['name'],
                    'Description' => $validated['description'],
                    'duration' => $validated['duration'],
                    "availability" => $validated['availability'],
                    'Prix' => $validated['prix'],
                    'categorie_id' => $id_categorie[0]['id'],
                    'updated_at' => now(),
                ]);
            
                
                return redirect()->back()->with('success','Le service a été mis à jour avec succès');
            
        }

    public function DeleteService(Request $request,$id)
    {
        if(!Auth::user()->HasPermission('manage_services'))
        {
            abort(404);
        }
        if (!$id) {
            abort(404);
        }
        $this->ServiceRepository->Delete($id);

        return redirect('/professional/services');
    }

    public function GestionReservationIndex()
    {
        if(!Auth::user()->HasPermission('manage_reservations'))
        {
            abort(404);
        }
        $prestataire_id = Auth::user()->id;
        $reservations = $this->ReservationRepository->GetReservationsByPrestataire($prestataire_id);


        return view('Prestataire.Dashboard-rendez-vous',compact('reservations'));
    }

    public function CancelReservation(Request $request,$id)
    {
        if(!Auth::user()->HasPermission('manage_reservations'))
        {
            abort(404);
        }
        $reservation = $this->ReservationRepository->CancelReservationById($id);

        return redirect('/professional/reservation');
    }

    public function CancelReservationWithDetails(Request $request,$id)
    {
        if(!Auth::user()->HasPermission('manage_reservations'))
        {
            abort(404);
        }
        $reservation = $this->ReservationRepository->CancelReservationById($id);

        return redirect('/professional/reservation/details/'.$id);
    }
    public function ConfirmReservation(Request $request,$id)
    {
        if(!Auth::user()->HasPermission('manage_reservations'))
        {
            abort(404);
        }
        $reservation = $this->ReservationRepository->ConfirmReservationByid($id);

        return redirect('/professional/reservation');
    }

    public function ReservationDetails($id)
    {
        if(!Auth::user()->HasPermission('manage_reservations'))
        {
            abort(404);
        }
        $reservation = $this->ReservationRepository->GetDetailsReservation($id);
        return view('Prestataire.Dashboard-Reservation-details',compact('reservation'));
    }

    public function AvisIndex()
    {
        $prestataire_id = Auth::user()->id;
        $statistic = $this->AvisRepository->getstatisticbyprestataire($prestataire_id);
         $avis = $this->AvisRepository->GetFeedbacksByPrestataire($prestataire_id);
        return view('Prestataire.Dashboard-Avis',compact('avis','prestataire_id','statistic'));
    }

    public function ProfileSettingsIndex()
    {
        $prestataire_id = Auth::user()->id;
        $phone = $this->PrestataireRepository->GetPhonebyid($prestataire_id);
        return view('Prestataire.Dashboard-settings',compact('phone'));
    }

    public function UpdatePrestataireDetails(Request $request)
    {
        $prestataire_id = Auth::user()->id;
            $validated = $request->validate([
                "first_name" => "required|string|min:6",
                "last_name" => "required|string|min:6",
                "email" => "required|string",
                "phone" => "required|string"
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

                    $DataPrestataire = [
                        "Numero_Telephone" => $request->phone
                    ];

                    $this->UtilisateurRepository->UpdateUtilisateur($prestataire_id,$data);

                    $this->PrestataireRepository->UpdatePrestataireInfo($prestataire_id,$DataPrestataire);
                    
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

                $DataPrestataire = [
                    "Numero_Telephone" => $request->phone
                ];

                $this->UtilisateurRepository->UpdateUtilisateur($prestataire_id,$data);

                $this->PrestataireRepository->UpdatePrestataireInfo($prestataire_id,$DataPrestataire);
                
                return redirect()->back()->with('infosupdated','Vos informations ont été mises à jour avec succès.');
            }
        }
    public function UpdatePassword(Request $request)
    {
        $prestataire_id = Auth::user()->id;
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
                    $this->UtilisateurRepository->UpdateUtilisateur($prestataire_id,[
                        "Password" => $newpassword
                    ]);

                    return redirect()->back()->with('passwordchanged','Votre mot de passe a été mis à jour avec succès.');
                }
            }
        }
        public function UpdateImage(Request $request)
        {
            $prestataire_id = Auth::user()->id;
            $request->validate([
                "profile_image" => "required|image|mimes:jpeg,png,jpg"
            ]);

            if($request->Hasfile('profile_image'))
            {
                $path = $request->file('profile_image')->store('Prestataire','public');
                $this->UtilisateurRepository->UpdateUtilisateur($prestataire_id,[
                    "Photo" => $path
                ]);

                return redirect()->back()->with('imagechanged','Votre photo de profil a été mise à jour avec succès.');
            }


    }

    public function ValidationReservation(Request $request,$id)
    {
        $reservation_id = $id;

        $reservation = $this->ReservationRepository->ValidateReservationByID($reservation_id);


        return redirect('/professional/reservation/details/'.$id);

    }
}
