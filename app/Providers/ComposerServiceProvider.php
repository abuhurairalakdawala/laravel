<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            ['layouts.navbar'], 'App\Composers\LayoutComposer'
        );
    }
}
