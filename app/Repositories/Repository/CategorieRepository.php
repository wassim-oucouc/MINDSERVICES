<?php

namespace  App\Repositories\Repository;


use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\BaseRepositoryInterface;



class CategorieRepository implements BaseRepositoryInterface
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
    {
        $categories = DB::table('categorie')->select('SELECT COUNT(service.titre),categorie.Nom AS Nom,categorie.Description AS Description,categorie.Photo AS Photo  from service inner join categorie on service.categorie_id = categorie.id');
        dd($categories);
        return $categories;
    }

}