<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
       // $categories = \App\Category::all(['name', 'slug']);
        /* view()->share('categories', $categories); */
         /* view()->composer(['welcome', 'single', 'cart'], function($view) {
            $view->with('categories', []);
         }); */

         view()->composer('layouts.front', 'App\Http\Views\CategoryViewComposer@compose');

    }
}
