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
        $id_client = Auth::user()->id;
        $statistic = $this->clientRepository->GetStatisticByClientId($id_client);
        $services = $this->ServiceRepository->getserviceslimit();

        $client = $this->clientRepository->GetclientDetails();
        $reservations = $this->clientRepository->GetReservationsDetails();
        return view('Client.Dashboard-home',compact('client','reservations','statistic','services'));
    }

    public function reservationRead()
    {
        $client_id = Auth::user()->id;
        $reservation = $this->ReservationRepository->GetReservationsClient();
        $CountReservation = $this->ReservationRepository->GetTotalReservationByID($client_id);
        return view('Client.Dashboard-services-reservés',compact('reservation','CountReservation'));
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

    if(!Auth::user()->HasPermission('edit_information'))
    {
        abort(404);
    }
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
        "photo" => "nullable|image"
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
if($request->file('photo'))
{
        $data = [
            "Prenom" => $request->prenom,
            "Nom" => $request->nom,
            "Photo" => $path,
            "updated_at" => now()
        ];
    }
    else
    {
        $data = [
            "Prenom" => $request->prenom,
            "Nom" => $request->nom,
            "updated_at" => now()
        ];
    }

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

                return redirect()->back()->with('done','Votre avis a été enregistré avec succès. Merci pour votre retour !');

            }
        }
    }


    public function RequestCancelReservation(Request $request)
    {
        if($request->reservation_id)
        {
            $cancel = $this->ReservationRepository->RequestCancel($request->reservation_id);
            if(!$cancel)
            {
              
                return redirect()->back()->with('success',"Votre Demande d'Annulation a éte bien pris en charge");
            }

        }
    }

    public function UpdateReservationDetails(Request $request)
    {
        $reservation_id = $request->reservation_id;
        $service_id = $request->service_id;

        $reservation = $this->ReservationRepository->FindReservationByDateAndTime($request->new_date,$request->time,$service_id);

        if($reservation)
        {
            return redirect('/client/reservation/details/'.$reservation_id)->with('error',"La date et l'heure sélectionnées pour ce service sont déjà réservées. Veuillez choisir un autre créneau disponible");
        }
        else
        {

        $updatereservation = $this->ReservationRepository->update($reservation_id,[
            "reservation_date" => $request->new_date,
            "reservation_time" => $request->time
        ]);

        return redirect('/client/reservation/details/'.$reservation_id)->with('modifier','La modification a été effectuée avec succès.');
    }



    }



}
