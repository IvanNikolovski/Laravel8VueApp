<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Jetstream::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
        $this->configureRoutes();
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
    
    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configureRoutes()
    {
        Route::group([
               'namespace' => 'Laravel\Jetstream\Http\Controllers',
               'domain' => config('jetstream.domain', null),
               'prefix' => config('jetstream.prefix', config('jetstream.path')),
           ], function () {
            //    $this->loadRoutesFrom(__DIR__.'/../routes/'.config('jetstream.stack').'.php');
            $this->loadRoutesFrom(base_path('routes/jetstream.php'));
        });
       
    }
}
