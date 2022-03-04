<?php

namespace App\Providers;

//use App\Models\Pizza;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        //to pass to all views (specifically the navbar) all the pizzas
        //View::share('pizzas', Pizza::all());
    }
}
