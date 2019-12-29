<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Social;
use App\Logo;
use App\Contacto;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $redes = Social::all();
        $principal = Logo::find(1);
        $footer = Logo::find(2);
        $favicon = Logo::find(3);
        $direccion = Contacto::find(1);
        $telefono = Contacto::find(2);
        $email = Contacto::find(3);
        $whatsapp = Contacto::find(5);

        return view()->share(compact('direccion', 'telefono', 'whatsapp', 'email','redes', 'principal', 'footer', 'favicon'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
