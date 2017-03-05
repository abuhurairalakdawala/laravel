<?php
namespace App\Helpers;

class Dropdown {
	public static function paginator()
	{
		return '<select name="no_of_docs" class="form-control paginator-dropdown"><option value="5">5 Records</option><option value="10">10 Records</option><option value="15">15 Records</option></select>';
	}
	public static function dashboard_option()
	{
		return '<select class="form-control dashboard-option"><option value="">Select An Option</option><option value="csv">Download CSV</option><option value="inward">Inward Order</option></select>';
	}
}