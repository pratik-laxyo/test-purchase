<?php 
	namespace App\Helpers;
	use Session;
	class Helper
	{
	    public static function diffForHumans($date)
	    {
	        return \Carbon\Carbon::parse($date)->diffForHumans();
	    }

	    public static function emptyCart($type)
	    {
	    		//session()->flash($type);
	    		Session::forget($type);
	    }
	}