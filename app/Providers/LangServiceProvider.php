<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LangServiceProvider extends ServiceProvider
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
      app()->singleton('lang', function ()
      {
        $user = auth()->user() ;
        if($user && !empty($user->lang))
          return $user->lang ;
       if(session()->has('lang'))
          return session()->get('lang');

       return 'en';
     });
    }
}
