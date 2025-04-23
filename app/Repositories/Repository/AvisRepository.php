<?php

namespace  App\Repositories\Repository;


use App\Models\Avis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\AvisInterface;


class AvisRepository implements AvisInterface
{
    public function find($id)
    {
        $Avis = Avis::find($id);
        return $Avis;
    }
    public function Update($id,array $data)
    {
       $avis = Avis::where('id',$id)->update($data);

       return $avis;
    }
    public function Delete($id)
    {
        $avis = Avis::find($id);
        if(!$id)
        {
            abort(404);
        }
        else
        {
            $avis->Delete();
            return $avis;
        }

    }
    public function create(array $data)
    {
        $Avis = Avis::create($data);

        return $Avis;

    }
    public function ReadAvis()
    {
        $Avis = Avis::select('Professional.Prenom AS ProfessionalPrenom','avis.Note','avis.id','avis.status','Professional.Nom AS ProfessionalNom','Professional.Photo AS ProfessionalPhoto','Client.Prenom AS ClientPrenom','Client.Nom AS ClientNom','Client.Photo AS ClientPhoto','avis.Note','avis.Commentaire','service.titre')
        ->join('service', 'service.id','=','avis.Service_id')
        ->join('utilisateur AS Client','Client.id', '=','avis.client_id')
        ->join('utilisateur AS Professional', 'Professional.id','=','avis.prestataire_id')
        ->get();

        return $Avis;
    }

    public function ApproveAvis($id)
    {
       $avis =  Avis::find($id);

        if($avis)
        {
            $avis->status = "Approuvé";
            $avis->save();
        }
    }

    public function CalculateAverageFeedback($id)
    {
        $AvisAverage = Avis::where('prestataire_id', $id)
        ->where('status', 'Approuvé')
        ->avg('Note');

        return $AvisAverage;
    }

    public function CountFeedbackPrestataire($id)
    {
        $TotalAvis = Avis::where('prestataire_id',$id)
        ->where('status','Approuvé')
        ->count();

        return $TotalAvis;
    }

    public function GetFeedbackLimit($id)
    {

        $Avis = Avis::where('prestataire_id',$id)
        ->where('status','Approuvé')
        ->with('Client')
        ->orderBy('id','DESC')
        ->limit(4)
        ->get();

      return $Avis;

      
    }
    public function GetFeedbacksWithPaginate($id)
    {
        $Avis = Avis::with('Client')->paginate(5);

        return $Avis;
    }

    public function AvisCheckById($service_id)
    {
        $avis = Avis::where('Service_id',$service_id)->where('client_id',Auth::user()->id)->first();

        return $avis;
    }


    public function GetFeedbacksByPrestataire($id)
    {
        $avis = Avis::where('Prestataire_id',$id)->with('Service','Client')->paginate(5);


        return $avis;
    }

    public function getstatisticbyprestataire($id)
    {
        $totalavis = Avis::where('prestataire_id',$id)->count();

        $averagenote = DB::table('avis')->where('prestataire_id',$id)->avg('Note');

        

        return $averagenote;
    }
}
