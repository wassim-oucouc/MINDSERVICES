<?php

namespace App\Http\Controllers;

use session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Contracts\AvisInterface;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Contracts\AdresseInterface;
use App\Repositories\Contracts\ServiceInterface;
use App\Repositories\Contracts\CategorieInterface;
use App\Repositories\Repository\AdresseRepository;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Contracts\PrestataireInterface;
use App\Repositories\Contracts\ReservationInterface;
use App\Repositories\Repository\CategorieRepository;
use App\Repositories\Repository\PrestataireRepository;
use App\Repositories\Repository\ReservationRepository;

class HomeController extends Controller
{
    private $ServiceRepository;
    private $AvisRepository;
    private $PrestataireRepository;
    private $CategorieRepository;
    private $ReservationRepository;
    private $AdresseRepository;

    public function __construct(ServiceInterface $ServiceRepository,AvisInterface $AvisRepository,PrestataireInterface $PrestataireRepository,CategorieInterface $CategorieRepository,ReservationInterface $ReservationRepository,AdresseInterface $AdresseRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
        $this->AvisRepository = $AvisRepository;
        $this->PrestataireRepository = $PrestataireRepository;
        $this->CategorieRepository = $CategorieRepository;
        $this->ReservationRepository = $ReservationRepository;
        $this->AdresseRepository = $AdresseRepository;
    }

    public function IndexHome()
    {
        $categories = $this->CategorieRepository->GetCategoriesLimit();
        return view('home',compact('categories'));
    }

    public function indexService(Request $request)
    {
        $service = $this->ServiceRepository->GetServiceDetails($request->id);
        if(!$service)
        {
            return view('page-notfound');
        }
        $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($service->Prestataire->id);

        $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($service->Prestataire->id);

        $Avis = $this->AvisRepository->GetFeedbackLimit($service->Prestataire->id);
        return view('service',compact('service','AvisAverage','TotalAvisPrestataire','Avis'));
    }

    public function GetProfile(Request $request)
    {
        $prestatairedetails = $this->PrestataireRepository->GetDetailsPrestataire($request->id);
        if(!$prestatairedetails)
        {
            return view('page-notfound');
        }
        $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($request->id);
        $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($request->id);
        return view('profile',compact('prestatairedetails','AvisAverage','TotalAvisPrestataire'));
    }

    public function GetProfileAvis(Request $request)
    {
        $prestatairedetails = $this->PrestataireRepository->GetDetailsPrestataire($request->id);
        if(!$prestatairedetails)
        {
            return view('page-notfound');
        }
        $AvisPaginate = $this->AvisRepository->GetFeedbacksWithPaginate($request->id);
        $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($request->id);
        $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($request->id);
        return view('Avis-Profile',compact('prestatairedetails','AvisAverage','TotalAvisPrestataire','AvisPaginate'));

    }

    public function GetProfileServices(Request $request)
    {
        $ServicesPaginate = $this->ServiceRepository->GetServicesWithPaginate($request->id);
        $prestatairedetails = $this->PrestataireRepository->GetDetailsPrestataire($request->id);
        if(!$prestatairedetails)
        {
            return view('page-notfound');
        }
        $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($request->id);
        $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($request->id);

        // dd($prestatairedetails);

        return view('Services-Profile',compact('ServicesPaginate','prestatairedetails','AvisAverage','TotalAvisPrestataire'));
    }


    public function IndexServiceSearch(Request $request)
    {
        $ServicePaginate = $this->ServiceRepository->GetServicesAll();
        $categories = $this->CategorieRepository->GetAllCategories();

        if($request->location && $request->service)
        {
            $ServiceFiltred = $this->ServiceRepository->GetServiceByNameCity($request->service,$request->location);
            // dd($ServiceFiltred);

            return response()->json([
                "message" => $ServiceFiltred,
            ]);
        }

         if($request->category && !$request->price)
        {
            $services = $this->ServiceRepository->GetServicebycategorie($request->category);
            // dd($services);
            return response()->json([
                "services" => $services
            ]);
        }

         else if($request->price && !$request->category)
        {
            if($request->price == 'Économique')
            {
                $services = $this->ServiceRepository->GetServiceWithPriceAsc();
            return response()->json([
                "services" => $services
            ]);
        }

            else if($request->price == 'Premium')
            {
               
                $services = $this->ServiceRepository->GetServiceWithPriceDesc();
                // dd($services);
                return response()->json([
                    "services" => $services
                ]);
            }
        }
        if($request->category && $request->price)
        {
            if($request->price == 'Économique')
            {
                $services = $this->ServiceRepository->GetServicesbycategorieAsc($request->category);

                return response()->json([
                    "services" => $services
                ]);
            }
            else
            {
                $services = $this->ServiceRepository->GetServicesbycategorieDesc($request->category);

                return response()->json([
                    "services" => $services
                ]);
            }
        }



        return view('services',compact('ServicePaginate','categories'));
    }

    public function IndexReservation($id)
    {
        $service = $this->ServiceRepository->GetServiceDetails($id);
        if(!$service)
        {
            return view('page-notfound');
        }
        $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($service->Prestataire->id);

        $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($service->Prestataire->id);
        return view('reservation',compact('service','AvisAverage','TotalAvisPrestataire'));
    }

    public function ReservationDateTime(Request $request)
    {
    if($request->date && $request->time && $request->id)
    {
        $reservation = $this->ReservationRepository->FindReservationByDateAndTime($request->date,$request->time,$request->id);
        if(!$reservation)
        {
            return response()->json(["valide_date" => "Date Never Taked"]);
        }
        else
        {
            return response()->json(["error_date" => "Already Taked Date"]);
        }
    }
}

public function StoreDateReservation(Request $request)
{
    $validated = $request->validate([
        "reservation_date" => "required",
        "reservation_time" => "required",
        "id_service" => "required",
        "prestataire_id" => "required"
    ]);


    session()->put('reservation',[
        "reservation_date" => $request->reservation_date,
        "reservation_time" => $request->reservation_time,
        "id_service" => $request->id_service,
        "prestataire_id" => $request->prestataire_id
    ]);


    return redirect('/reservation/step/complete');
}

public function FormReservation()
{
   
    $data = session('reservation');
    $service = $this->ServiceRepository->GetServiceDetails($data['id_service']);
    $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($service->Prestataire->id);
    $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($service->Prestataire->id);
    $totalprix = $service->Prix * $service->duration;
    
    return view('reservation-informations',compact('data','AvisAverage','TotalAvisPrestataire','service','totalprix'));
}

public function StoreReservation(Request $request)
{
  
    $data = session('reservation');
    $reservation = $this->ReservationRepository->FindReservationByDateAndTime($data['reservation_date'], $data['reservation_time'],$data['id_service']);
    
    $validated = $request->validate([
        "address" => "required|string|min:8",
        "postal_code" => "required",
        "city" => "required|string",
        "pays" => "required",
        "terms" => "required"
    ]);

    if ($reservation){
return redirect('/reservation/service/' . $data['id_service'])->with('error', 'Cette date et heure sont déjà réservées. Merci de choisir une nouvelle date et heure.');
}

$adress = $this->AdresseRepository->create([
                    "address" => $validated['address'],
                    "postal_code" => $validated['postal_code'],
                    "city" => $validated['city'],
                    "country" => $validated['pays']
                ]);

                $reservation = $this->ReservationRepository->insert([
                                    "client_id" => Auth::user()->id,
                                    "prestataire_id" => $data['prestataire_id'],
                                    "service_id" => $data['id_service'],
                                    "addresse_id" => $adress->id,
                                    "reservation_date" => $data['reservation_date'],
                                    "reservation_time" => $data['reservation_time'],
                                    "created_at" => now(),
                                    "status" => "En attente Paiement"
                                ]);
                
                                $service = $this->ServiceRepository->GetServiceDetails($data['id_service']);

    $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($service->Prestataire->id);
    $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($service->Prestataire->id);
                                session()->put('confirmation',[
                                    "id" => $reservation,
                                                    "PrenomPrestataire" => $service->Prestataire->Prenom,
                                                    "NomPrestataire" => $service->Prestataire->Nom,
                                                    "reservation_date" => $data['reservation_date'],
                                                    "amount" => $request->amount,
                                                    "titre" => $request->titre,
                                                    "Email" => $request->Email,
                                                    "reservation_time" => $data['reservation_time'],
                                                    "TitreService" => $service->titre,
                                                    "address" => $validated['address'],
                                                    "postal_code" => $validated['postal_code'],
                                                    "city" => $validated['city'],
                                                    "pays" => $validated['pays']
                                                ]);

                                                return redirect(route('payment'));

}


public function ConfirmationReservation()
{
    $confirmation = session('confirmation');
    if(!$confirmation)
    {
        return redirect('/services');
    }

    return view('reservation-confirmation',compact('confirmation'));
}

public function Prestataires()
{
$prestataires = $this->PrestataireRepository->GetPrestataires();
// dd($prestataires);
    return view('prestataires',compact('prestataires'));
}

public function IndexCategories()
{
    $categories = $this->CategorieRepository->GetCategoriesPaginate();

    return view('categories',compact('categories'));
}

public function IndexCategorieServices($id)
{
    $services = $this->ServiceRepository->GetServicesByCategorieID($id);
    dd($services);

    // $avisaverage = $this->AvisRepository->CalculateAverageFeedback($services->Professional->id);


    $categorie = $this->CategorieRepository->find($id);

    return view('categorie-services',compact('services','categorie'));
}

}
