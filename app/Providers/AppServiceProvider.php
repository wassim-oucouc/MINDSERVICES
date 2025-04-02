<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\AvisInterface;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Contracts\CategorieInterface;
use App\Repositories\Repository\CategorieRepository;
use App\Repositories\Repository\UtilisateurRepository;
use App\Repositories\Contracts\BaseRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class,UtilisateurRepository::class);
        $this->app->bind(CategorieInterface::class,CategorieRepository::class);
        $this->app->bind(AvisInterface::class,AvisRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
