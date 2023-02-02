<?php

use App\Models\Admin;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function admin(){
    return Auth::guard('admin')->user();
}




//number en2bn and bn2en
class BanglaConverter {
    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

    public static function bn2en($number) {
        return str_replace(self::$bn, self::$en, $number);
    }

    public static function en2bn($number) {
        return str_replace(self::$en, self::$bn, $number);
    }
}

function settings()
{
    return Setting::first();
}

function contact_us()
{
    return ContactUs::first();
}

function getAdmin($id, $column)
{
    $admin = Admin::find($id);
    if(!empty($admin))
    {
        return  $admin->$column;
    }
    else
    {
        return "";
    }
}
