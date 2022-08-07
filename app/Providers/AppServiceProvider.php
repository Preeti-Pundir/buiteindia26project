<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use app\Contracts\BrandContract;
use app\Repositories\BrandRepository;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//         $this->app->bind(
//             'Illuminate\Contracts\Auth\Registrar',
//             'App\Services\Registrar',
//            'App\Repositories\ClassImplementing\BrandRepository::class');
   
//             'Illuminate\Database\ConnectionResolverInterface',
//             'App\Contracts\BrandContract',
//             'App\Repositories\BrandRepository',
//    //         $this->app->bind(\App\Contracts\BrandContract::class, App\Repositories\ClassImplementing\BrandRepository::class);
   
//         );
            
            $this->app->bind(
                'App\Contracts\BrandContract::class', 'App\Repositories\ClassImplementing\BrandRepository::class'
            );
                
            
   
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
