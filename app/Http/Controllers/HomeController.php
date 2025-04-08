<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Repository\PrestataireRepository;

class HomeController extends Controller
{
    private $ServiceRepository;
    private $AvisRepository;
    private $PrestataireRepository;

    public function __construct(ServiceRepository $ServiceRepository,AvisRepository $AvisRepository,PrestataireRepository $PrestataireRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
        $this->AvisRepository = $AvisRepository;
        $this->PrestataireRepository = $PrestataireRepository;
    }

    public function indexService(Request $request)
    {
        $service = $this->ServiceRepository->GetServiceDetails($request->id);

        $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($service->Prestataire->id);

        $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($service->Prestataire->id);

        $Avis = $this->AvisRepository->GetFeedbackLimit($service->Prestataire->id);

        // dd($Avis);
        
        return view('service',compact('service','AvisAverage','TotalAvisPrestataire','Avis'));
    }

    public function GetProfile(Request $request)
    {
        $prestatairedetails = $this->PrestataireRepository->GetDetailsPrestataire($request->id);
        $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($request->id);

        $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($request->id);

        // dd($prestatairedetails);

        return view('profile',compact('prestatairedetails','AvisAverage','TotalAvisPrestataire'));
    }


    public function IndexServiceSearch()
    {
        return view('services');
    }
}
