<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Assets extends Facade {
	public static $css,$js;
	public static function css()
	{
		return self::$css;
	}
	public static function js()
	{
		return self::$js;
	}
	public static function setCss($item)
	{
		if(is_array($item)){
			foreach ($item as $css) {
				self::$css .= '<link rel="stylesheet" href="'.mix('css/'.$css).'">';
			}
			unset($css);
		} else {
			self::$css .= '<link rel="stylesheet" href="'.mix('css/'.$item).'">';
		}
	}
	public static function setJs($item)
	{
		if(is_array($item)){
			foreach ($item as $js) {
				self::$js .= '<script type="text/javascript" src="'.mix('js/'.$js).'"></script>';
			}
			unset($js);
		} else {
			self::$js .= '<script type="text/javascript" src="'.mix('js/'.$item).'"></script>';
		}
	}
}