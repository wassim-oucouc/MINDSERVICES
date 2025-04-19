<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\AvisInterface;
use App\Repositories\Contracts\ClientInterface;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Contracts\ServiceInterface;
use App\Repositories\Repository\ClientRepository;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Contracts\ReservationInterface;
use App\Repositories\Repository\ReservationRepository;

class ClientController extends Controller
{
    private $ReservationRepository;
    private $clientRepository;
    private $AvisRepository;
    private $ServiceRepository;

    public function __construct(ReservationInterface $ReservationRepository,ClientInterface $clientRepository,AvisInterface $AvisRepository,ServiceInterface $ServiceRepository)
    {
        $this->ReservationRepository = $ReservationRepository;
        $this->clientRepository = $clientRepository;
        $this->AvisRepository = $AvisRepository;
        $this->ServiceRepository = $ServiceRepository;
    }

    public function Index()
    {
        $client = $this->clientRepository->GetclientDetails();
        $reservations = $this->clientRepository->GetReservationsDetails();
        return view('Client.Dashboard-home',compact('client','reservations'));
    }

    public function reservationRead()
    {
        $reservation = $this->ReservationRepository->GetReservationsClient();
        return view('Client.Dashboard-services-reservés',compact('reservation'));
    }

    public function GetReservationDetails(Request $request)
    {
        $reservation  = $this->ReservationRepository->GetDetailsReservation($request->id);
        if($reservation)
        {
        $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($reservation->Prestataire->id);
        $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($reservation->Prestataire->id);
       $totalReservation =  $reservation->Service->Prix * $reservation->Service->duration;
        }
        // dd($totalReservation);
        return view('Client.Dashboard-Reservation-Details',compact('reservation','totalReservation','TotalAvisPrestataire','AvisAverage'));
    }

    public function Profile()
    {
        $client = $this->clientRepository->GetclientDetails();
        $reservations = $this->clientRepository->GetReservationsDetails();
        return view('Client.Dashboard-profile',compact('client','reservations'));
    }

    public function UpdateClientProfile(Request $request)
{
    $client = $this->clientRepository->GetclientDetails();
if($request->nom)
{
    try
    {
    $validated = $request->validate([
        "prenom" => "required|string|max:50",
        "nom" => "required|string|max:50",
        "email" => "nullable|email|unique:utilisateur,email",
        "telephone" => "required|string|max:20",
        "pays" => "required",
        "current_password" => "nullable|string|min:8",
        "password" => "nullable|string|min:8",
        "password-confirm" => "nullable|string|same:password",
        "photo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg"
    ]);
}
   catch(\Illuminate\Validation\ValidationException $e)
   {
    return response()->json([
        "errors" => $e->errors()
    ]);
   }


    if (!$request->filled('current-password') && !$request->filled('email')) {
        if ($request->file('photo')){
            $path = $request->file('photo')->store('User', 'public');
        }

        $data = [
            "Prenom" => $request->prenom,
            "Nom" => $request->nom,
            "Photo" => $path,
            "updated_at" => now()
        ];

        $dataclient = [
            "telephone" => $request->telephone,
            "pays" => $request->pays
        ];

        $this->clientRepository->update(Auth::user()->id, $data);
        $this->clientRepository->UpdateClientInfo(Auth::user()->id, $dataclient);

        return response()->json([
            "message" => "Profile updated successfully!"
        ]);
    } else if($request->filled('current-password') && !$request->filled('email')) {
        $password = $this->clientRepository->find(Auth::user()->id);
         if (Hash::check($request->current_password, $password->Password)) {
           
            $newpassword = Hash::make($request->password);

            if ($request->hasFile('photo')){
                $path = $request->file('photo')->store('User', 'public');
            }

            $data = [
                "Prenom" => $request->prenom,
                "Nom" => $request->nom,
                "Password" => $newpassword,
                "Photo" => $client->Photo,
                "updated_at" => now()
            ];

            $dataclient = [
                "telephone" => $request->telephone,
                "pays" => $request->pays
            ];

            $this->clientRepository->update(Auth::user()->id, $data);
            $this->clientRepository->UpdateClientInfo(Auth::user()->id, $dataclient);

            return response()->json([
                "message" => "Profile updated successfully!"
            ]);
            
        }
        else {
            return response()->json([
                "message" => "Current password is incorrect."
            ], 400);
        }
    }
        else if(!$request->filled('current-password') && $request->filled('email'))
        {
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('User', 'public');
            }
            $data = [
                "Prenom" => $request->prenom,
                "Nom" => $request->nom,
                "Email" => $request->email,
                "Photo" => $client->Photo,
                "updated_at" => now()
            ];

            $dataclient = [
                "telephone" => $request->telephone,
                "pays" => $request->pays
            ];
            $this->clientRepository->update(Auth::user()->id, $data);
            $this->clientRepository->UpdateClientInfo(Auth::user()->id, $dataclient);

            return response()->json([
                "message" => "Profile updated successfully!"
            ]);


        }
        else
        {
            $password = $this->clientRepository->find(Auth::user()->id);
            if (Hash::check($request->current_password, $password->Password)) {
              
               $newpassword = Hash::make($request->password);
   
               if ($request->hasFile('photo')) {
                   $path = $request->file('photo')->store('User', 'public');
               }
   
               $data = [
                   "Prenom" => $request->prenom,
                   "Nom" => $request->nom,
                   "Email" => $request->email,
                   "Password" => $newpassword,
                   "Photo" => $client->Photo,
                   "updated_at" => now()
               ];
   
               $dataclient = [
                   "telephone" => $request->telephone,
                   "pays" => $request->pays
               ];
   
               $this->clientRepository->update(Auth::user()->id, $data);
               $this->clientRepository->UpdateClientInfo(Auth::user()->id, $dataclient);
   
               return response()->json([
                   "message" => "Profile updated successfully!"
               ]);
               
           }
           else {
               return response()->json([
                   "message" => "Current password is incorrect."
               ], 400);
           }
        }
         
    }

    return view('Client.Dashboard-settings', compact('client'));
}


public function showFeedbackForm($id)
{
    $service = $this->ServiceRepository->find($id);
    $prestataire_id = $service->Prestataire->id;
    return view('Client.Dashboard-Service-reservés-avis', compact('service', 'prestataire_id'));
}




public function CreateFeedbackReservation(Request $request,$id)
{
    $service = $this->ServiceRepository->find($id);
    $prestataire_id = $service->Prestataire->id;
   
    if($request->rating)
    {

      

        $validation = $request->validate([
            "rating" => "required",
            "comment" => "required"
        ]);

        $checkAvis = $this->AvisRepository->AvisCheckById($id);

        if($checkAvis)
        {
            return redirect()->back()->with('error','Vous Avez deja Fait un avis pour ce Service');
        }
        else
        {
            $data = [
                "Note" => $validation['rating'],
                "Commentaire" => $validation['comment'],
                "status" => "En attente",
                "Client_id" => Auth::user()->id,
                "prestataire_id" =>  $prestataire_id,
                "Service_id" => $id,
                "created_at" => now(),
                "updated_at" => now()
            ];

            $avis = $this->AvisRepository->create($data);
            return redirect('client/reservation')->with('done','Votre avis a été enregistré avec succès. Merci pour votre retour !');
           
        }
    }
    return view('Client.Dashboard-Service-reservés-avis', compact('service', 'prestataire_id'));


    }

    public function StoreFeedbackReservation(Request $request,$id)
    {
        if($request->rating)
        {
            $service_id = $request->service_id;
            $prestataire_id = $request->prestataire_id;
            $checkAvis = $this->AvisRepository->AvisCheckById($service_id);

            if($checkAvis)
            {
                return Redirect()->back()->with('error','Vous avez déjà soumis un avis pour ce service. Merci de votre contribution!');
            }
            else
            {
                $data = [
                    "Note" => $request->rating,
                    "Commentaire" => $request->comment,
                    "status" => "En attente",
                    "Client_id" => Auth::user()->id,
                    "prestataire_id" => $prestataire_id,
                    "Service_id" => $service_id,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
    
                $avis = $this->AvisRepository->create($data);

                return redirect()->back()->with('done','Votre avis a bien été enregistré avec succès. Merci pour votre retour !');

            }
        }
    }



}
