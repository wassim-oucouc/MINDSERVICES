<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(BaseRepositoryInterface::class,UtilisateurRepository::class);
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
