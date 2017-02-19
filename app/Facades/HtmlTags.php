<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class HtmlTags extends Facade {
	public static $title = 'Abuhuraira Khalid Lakdawala';
	public static function title()
	{
		return self::$title;
	}
	public static function setTitle($title)
	{
		self::$title = $title;
	}
}