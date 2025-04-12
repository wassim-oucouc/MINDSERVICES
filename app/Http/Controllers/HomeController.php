<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Repository\CategorieRepository;
use App\Repositories\Repository\PrestataireRepository;

class HomeController extends Controller
{
    private $ServiceRepository;
    private $AvisRepository;
    private $PrestataireRepository;
    private $CategorieRepository;

    public function __construct(ServiceRepository $ServiceRepository,AvisRepository $AvisRepository,PrestataireRepository $PrestataireRepository,CategorieRepository $CategorieRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
        $this->AvisRepository = $AvisRepository;
        $this->PrestataireRepository = $PrestataireRepository;
        $this->CategorieRepository = $CategorieRepository;
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
            $ServiceFiltred = $this->ServiceRepository->GetServiceByNameCity(substr($request->service,0, 3),$request->location);
            // dd($ServiceFiltred);

            return response()->json([
                "message" => $ServiceFiltred,
            ]);
        }

        if($request->category)
        {
            $services = $this->ServiceRepository->GetServicebycategorie($request->category);
            // dd($services);
            return response()->json([
                "services" => $services
            ]);
        }

        if($request->price)
        {
            if($request->price == 'Économique')
            {
                $services = $this->ServiceRepository->GetServiceWithPriceAsc();
            return response()->json([
                "services" => $services
            ]);
        }

            if($request->price == 'Premium')
            {
               
                $services = $this->ServiceRepository->GetServiceWithPriceDesc();
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
        }



        return view('services',compact('ServicePaginate','categories'));
    }
}
