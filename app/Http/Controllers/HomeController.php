<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Repository\ServiceRepository;

class HomeController extends Controller
{
    private $ServiceRepository;
    private $AvisRepository;

    public function __construct(ServiceRepository $ServiceRepository,AvisRepository $AvisRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
        $this->AvisRepository = $AvisRepository;
    }

    public function indexService(Request $request)
    {
        $service = $this->ServiceRepository->GetServiceDetails($request->id);
        // dd($service);
        $AvisAverage = $this->AvisRepository->CalculateAverageFeedback($service->Prestataire->id);

        $TotalAvisPrestataire = $this->AvisRepository->CountFeedbackPrestataire($service->Prestataire->id);

        $Avis = $this->AvisRepository->GetFeedbackLimit($service->Prestataire->id);

        // dd($Avis);




     

        
        return view('service',compact('service','AvisAverage','TotalAvisPrestataire','Avis'));
    }


    public function IndexServiceSearch()
    {
        return view('services');
    }
}
