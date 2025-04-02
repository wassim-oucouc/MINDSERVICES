<?php

namespace App\Http\Controllers\Auth;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Repository\UtilisateurRepository;


class AuthController extends Controller
{
    private $UtilisateurRepository;
    Private $Nom;

    public function __construct(UtilisateurRepository $UtilisateurRepository)
    {
        $this->UtilisateurRepository =  $UtilisateurRepository;
    }
    public function RegisterProfessional(Request $request)
    {
        // dd($request->all());
       $validated =  $request->validate([
            "Prenom" => "required|string",
            "Nom" => "required|string",
            "Email" => "required|unique:utilisateur",
            "Password" => "required|min:8",
            "NumeroTele" => "required|min:5",
            "Photo" => "image|required",
            "service" => "required",
            "Ville" => "required|string",
            "PostalCode" => "required",
            "pays" => "required",
            "Adresse" => "required|string|min:5",
        ]);

        if($validated['Photo'])
        {
            $path = $request->file('Photo')->store('User','public');
            // dd($path);
        }
        $user = $this->UtilisateurRepository->InsertProfessional([
           "Prenom"=>  $validated['Prenom'],
           "Nom" =>  $validated['Nom'],
           "Email" => $validated['Email'],
           "Password" => hash::make($validated['Password']),
           "Photo" => $path,
           "role_id" => 1,
           "Status" => "Active",
           "created_at" => now(),
           "updated_at" => now(),
        ],[
            "Numero_Telephone" => $validated['NumeroTele'],
            "Adresse" => $validated['Adresse'],
            "zip_code" => $validated['PostalCode'],
            "Ville" => $validated['Ville'],
            "service_principal" => $validated['service'],
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        // dd($user);
       
        return view('Register.Register-Professional');

    }


    public function RegisterClient(Request $request)
    {
        $validated = $request->validate([
            "Prenom" => "required|string",
            "Nom" => "required|string",
            "Email" => "required|unique:utilisateur",
            "Password" => "required|min:8",
            "NumeroTele" => "required|min:5",
            "Photo" => "image|required",
            "pays" => "required",
        ]);

        if($validated['Photo'])
        {
            $path = $request->file('Photo')->store('User','public');
            // dd($path);
        }

        $user =$this->UtilisateurRepository->Insert([
            "Prenom"=> $validated['Prenom'],
            "Nom" => $validated['Nom'],
            "Email" => $validated['Email'],
             "Password" => hash::make($validated['Password']),
             "Photo" => $path,
             "role_id" => 2,
             "Status" => "Active",
             "created_at" => now(),
             'updated_at' => now(),]
            ,[
                "Numero_Telephone" => $validated['NumeroTele'],
                "pays" => $validated['pays'],
            ]);

        return view('Register.Register-Client');
    }

    public function Login(Request $request)
    {

       $validate =  $request->validate([
            "Email" => "required|email",
            "Password" => "required",
        ]);


     $user = $this->UtilisateurRepository->FindByEmail($request->Email);



     if(!$user || !hash::check($request->Password,$user->Password))
     {
        return redirect()->back()->with('error','Email Or Password is Incorrect');
     }

   else  if($user && hash::check($request->Password,$user->Password))
     {
       Auth::login($user);
       
       $request->session()->regenerate();
        
      switch($user->role_id)
      {
        case 1: 
        return redirect('/professional/dashboard');
        break;
      case 2 : 
        return redirect('/client/dashboard');
        break;
    
     case 3 : 
        return redirect('/admin/dashboard');
        break;
      }
    }

     
     
     return view('Login.Login');
    }

    public function Logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            session::flush();
            $request->session()->invalidate();
            return redirect('/login');
        }
        return redirect('/login');
    }
}
