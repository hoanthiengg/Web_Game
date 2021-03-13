<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // view()->composer(['page.nav','cpadmin.modules.flim.create','cpadmin.modules.flim.edit'],'App\Http\ViewComposers\MovieComposer');
        view()->composer(['cpadmin.modules.game.create','cpadmin.modules.game.edit','cpadmin.modules.Dashboard'],'App\Http\ViewComposers\GameComposer');
        
    }
}
