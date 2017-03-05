<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    protected $defer = true;
    public function boot()
    {
        View::composer(
            'dashboard', 'App\Http\ViewComposers\ProfileComposer'
        );
    }
}