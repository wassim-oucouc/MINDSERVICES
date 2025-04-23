<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    if($request->date && $request->time)
    {
        $reservation = $this->ReservationRepository->FindReservationByDateAndTime($request->date,$request->time);
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


public function IndexReserve(Request $request)
{
    $date_reservation = $request->reservation_date ?? 0;
    $reservation_time = $request->reservation_time ?? 0;
    $id_service = $request->id_service ?? 0;
    $prestataire_id = $request->prestataire_id ?? 0;

  session()->put('reservation',[
        "date_reservation" => $request->reservation_date,
        "reservation_time" => $request->reservation_time,
        "id_service" => $request->id_service,
        "prestataire_id" => $request->prestataire_id,
    ]);

    $data = session('reservation');


    $service = $this->ServiceRepository->GetServiceDetails($data['id_service']);

    $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($service->Prestataire->id);
    $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($service->Prestataire->id);

    $totalprix = $service->Prix * $service->duration;

  
    $reservation = $this->ReservationRepository->FindReservationByDateAndTime($data['date_reservation'], $data['reservation_time']);
    if ($reservation){
        return redirect('/reservation/service/' . $id_service)
            ->with('error', 'Cette date et heure sont déjà réservées. Merci de choisir une nouvelle date et heure.');
    } else {
            $validated = $request->validate([
                "address" => "required|string",
                "postal_code" => "required",
                "city" => "required|string",
                "pays" => "required|string"
            ]);

            if($request->address) {
                $reservation = $this->ReservationRepository->FindReservationByDateAndTime($request->date, $request->time);
                if ($reservation){
                    return redirect('/reservation/service/' . $id_service)
                        ->with('error', 'Cette date et heure sont déjà réservées. Merci de choisir une nouvelle date et heure.');
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
                "reservation_date" => $request->date,
                "reservation_time" => $request->time,
                "created_at" => now(),
                "status" => "En attente"
            ]);
            session()->put('confirmation',[
                "PrenomPrestataire" => $service->Prestataire->Prenom,
                "NomPrestataire" => $service->Prestataire->Nom,
                "reservation_date" => $request->date,
                "reservation_time" => $request->time,
                "TitreService" => $service->titre,
                "address" => $validated['address'],
                "postal_code" => $validated['postal_code'],
                "city" => $validated['city'],
                "pays" => $validated['pays']
            ]);
            return redirect('/reservation-confirmation');
        
        }
    }

    return view('reservation-informations', compact(
        'date_reservation',
        'reservation_time',
        'service',
        'AvisAverage',
        'TotalAvisPrestataire',
        'totalprix',
        'id_service',
        'prestataire_id'
    ));
}



public function ConfirmationReservation()
{
    $confirmation = session('confirmation');

    return view('reservation-confirmation',compact('confirmation'));
}

public function Prestataires()
{
$prestataires = $this->PrestataireRepository->GetPrestataires();
// dd($prestataires);
    return view('prestataires',compact('prestataires'));
}

}
