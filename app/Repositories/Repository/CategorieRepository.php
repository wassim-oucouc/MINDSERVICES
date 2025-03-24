<?php

namespace  App\Repositories\Repository;


use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\CategorieInterface;



class CategorieRepository implements CategorieInterface
{
    public function find($id)
    {
        $categorie = Categorie::find($id);
        return $categorie;
    }
    public function Update($id,array $data)
    {
        $categorie  = Categorie::find($id);
        $categorie->update($data);

        return $categorie;
    }

    public function GetIdByName($name)
    {
        $id = Categorie::select('id')->where('Nom',$name)->get('id');
        return $id;   
    }

    public function Delete($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return $categorie;
    }

    public function create(array $data)
    {
        $categorie = Categorie::create($data);
        return $categorie;
    }

    public function ReadCategories()
    {$categories = DB::table('service')
        ->Rightjoin('categorie', 'categorie.id', '=', 'service.categorie_id')
        ->groupBy('categorie.id', 'categorie.Nom','categorie.Description','categorie.Photo','categorie.created_at','categorie.updated_at')  
        ->select(
            'categorie.Nom',
            DB::raw('COUNT(service.titre) AS COUNT'),
            'categorie.Description',
            'categorie.id',
            'categorie.Photo',
            'categorie.created_at'
        )
        ->get();
    
        return $categories;
    }
}