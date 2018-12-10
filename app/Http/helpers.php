<?php
use App\Settings;
use App\User;
use App\Properties;
use App\Types;

 
if (! function_exists('getcong')) {

    function getcong($key)
    {
    	 
        $settings = Settings::findOrFail('1'); 

        return $settings->$key;
    }
}
 
if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (!function_exists('classActivePathPublic')) {
    function classActivePathPublic($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' current';
    }
}

if (!function_exists('classActiveUserMenu')) {
    function classActiveUserMenu($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return 'active';
    }
}

if (! function_exists('getUserInfo')) {
	function getUserInfo($id) 
	{ 
		return User::find($id);
	}
}

if (! function_exists('countPropertyType')) {
	function countPropertyType($type_id) 
	{ 
		return Properties::where(['status'=>1,'property_type'=>$type_id])->count();
	}
}

if (! function_exists('PropertyTypeName')) {
	function getPropertyTypeName($id) 
	{ 
		return Types::find($id);
	}
}

function format_price($price, $post = 1)
{
    if ($post === 1)
    {
        $formatted_price = number_format($price, 0, ',', ',');
    } else {
        $formatted_price = number_format($price, 0);
    }

    return $formatted_price;
}
