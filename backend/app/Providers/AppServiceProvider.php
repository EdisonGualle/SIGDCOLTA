<?php

namespace App\Providers;

use App\Repositories\PermisoRepository;
use App\Repositories\PermisoRepositoryInterface;
use App\Transformers\PermisoTransformer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PermisoRepositoryInterface::class, PermisoRepository::class);
        $this->app->bind(PermisoTransformer::class);

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
