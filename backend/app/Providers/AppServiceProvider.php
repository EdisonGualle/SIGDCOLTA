<?php

namespace App\Providers;

use App\Repositories\PermisoRepository;
use App\Repositories\PermisoRepositoryInterface;
use App\Transformers\PermisoTransformer;
use Illuminate\Support\ServiceProvider;
use App\Services\ConfiguracionService;

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
        $this->app->bind(ConfiguracionService::class, function () {
            return new ConfiguracionService();
        });

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
