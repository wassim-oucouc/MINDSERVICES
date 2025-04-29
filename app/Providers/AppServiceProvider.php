<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\AvisInterface;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Contracts\ClientInterface;
use App\Repositories\Repository\AvisRepository;
use App\Repositories\Contracts\AdresseInterface;
use App\Repositories\Contracts\ServiceInterface;
use App\Repositories\Repository\clientRepository;
use App\Repositories\Contracts\CategorieInterface;
use App\Repositories\Repository\AdresseRepository;
use App\Repositories\Repository\ServiceRepository;
use App\Repositories\Contracts\PrestataireInterface;
use App\Repositories\Contracts\ReservationInterface;
use App\Repositories\Contracts\UtilisateurInterface;
use App\Repositories\Repository\CategorieRepository;
use App\Repositories\Repository\PrestataireRepository;
use App\Repositories\Repository\ReservationRepository;
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
        $this->app->bind(UtilisateurInterface::class,UtilisateurRepository::class);
        $this->app->bind(CategorieInterface::class,CategorieRepository::class);
        $this->app->bind(AvisInterface::class,AvisRepository::class);
        $this->app->bind(ReservationInterface::class,ReservationRepository::class);
        $this->app->bind(ClientInterface::class,clientRepository::class);
        $this->app->bind(PrestataireInterface::class,PrestataireRepository::class);
        $this->app->bind(ServiceInterface::class,ServiceRepository::class);
        $this->app->bind(AdresseInterface::class,AdresseRepository::class);
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
