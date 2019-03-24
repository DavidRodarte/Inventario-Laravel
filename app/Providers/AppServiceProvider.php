<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/*
Tuve que incluir la librería para utilizar la clase de Schema en el método boot
*/
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        Tenía problemas debido a que la versión de mysql que se instala con xampp daba error al hacer
        php artisan migrate, la solución fue cambiar la cantidad de caracteres de los string en la clase Schema
        */
        Schema::defaultStringLength(191);
    }
}
