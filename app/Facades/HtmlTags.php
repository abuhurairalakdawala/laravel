<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class HtmlTags extends Facade {
	public static $title = 'Abuhuraira Khalid Lakdawala';
	public static $base_tag = '/';
	public static function title()
	{
		return self::$title;
	}
	public static function setTitle($title)
	{
		self::$title = $title;
	}
	public static function setBaseTag($base_tag)
	{
		self::$base_tag = $base_tag;
	}
	public static function baseTag()
	{
		return self::$base_tag;
	}
}