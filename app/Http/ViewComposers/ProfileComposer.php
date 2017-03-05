<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ProfileComposer
{
    protected $users;
    public function __construct()
    {
        $this->users = 'abu';
    }

    public function compose(View $view)
    {
        $view->with('count', '100');
    }
}