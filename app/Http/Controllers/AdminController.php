<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Repository\CategorieRepository;

class AdminController extends Controller
{
    Private $CategorieRepository;

    public function __construct()
    {
        $this->CategorieRepository = new CategorieRepository();
    }

    public function SelectCategories()
    {
        $categories = $this->CategorieRepository->ReadCategories();
            dd($categories);
            return view('/admin/categories',compact(categories));
    }
    public function Create(Request $request)
    {
     

    }
}
