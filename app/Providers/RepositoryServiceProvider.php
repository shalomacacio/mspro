<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\PacienteRepository::class, \App\Repositories\PacienteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UfRepository::class, \App\Repositories\UfRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CidadeRepository::class, \App\Repositories\CidadeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BairroRepository::class, \App\Repositories\BairroRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UbsRepository::class, \App\Repositories\UbsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ComorbidadeRepository::class, \App\Repositories\ComorbidadeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CampanhaRepository::class, \App\Repositories\CampanhaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AgendaRepository::class, \App\Repositories\AgendaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ComunicadoRepository::class, \App\Repositories\ComunicadoRepositoryEloquent::class);
        //:end-bindings:
    }
}
