<?php

namespace App\Composers;

use Illuminate\View\View;

class LayoutComposer {
	public function compose(View $view)
	{
		$user = auth()->user();
		return $view->with('username', ($user) ? $user->firstname.' '.$user->lastname : '');
	}
}