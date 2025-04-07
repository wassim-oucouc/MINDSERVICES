<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Repository\ClientRepository;
use App\Repositories\Repository\ReservationRepository;

class ClientController extends Controller
{
    private $ReservationRepository;
    private $clientRepository;

    public function __construct(ReservationRepository $ReservationRepository,ClientRepository $clientRepository)
    {
        $this->ReservationRepository = $ReservationRepository;
        $this->clientRepository = $clientRepository;
    }

    public function Index()
    {
        return view('Client.Dashboard-home');
    }

    public function reservationRead()
    {
        $reservation = $this->ReservationRepository->GetReservationsClient();
        return view('Client.Dashboard-services-reservés',compact('reservation'));
    }

    public function GetReservationDetails(Request $request)
    {
        $reservation  = $this->ReservationRepository->GetDetailsReservation($request->id);
       $totalReservation =  $reservation->Service->Prix * $reservation->Service->duration;
        // dd($totalReservation);
        return view('Client.Dashboard-Reservation-Details',compact('reservation','totalReservation'));
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
        if ($request->file('photo')) {
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

            if ($request->hasFile('photo')) {
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
}
