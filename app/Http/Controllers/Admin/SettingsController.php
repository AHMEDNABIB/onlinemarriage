<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Toastr;

class SettingsController extends Controller
{
    public function add()
    {
        $settings = Setting::first();
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $settings = Setting::first();

        //main logo
        if($main_logo = $request->file('main_logo'))
        {
            $request->validate([
                'image' => ['mimes:jpeg,png,jpg', 'max:500'],
            ]);

            if(!empty($settings) && file_exists(public_path($settings->main_logo)))
            {
                @unlink($settings->main_logo);
            }
            $main_logo_path = public_path('images/logo/');
            $main_logo_name = rand(100000, 999999)."main_logo." . $main_logo->getClientOriginalExtension();
            $main_logo->move($main_logo_path, $main_logo_name);
            $main_logo_path_name = 'images/logo/'.$main_logo_name;
        }
        else
        {
            if(!empty($settings) && isset($settings->main_logo))
            {
                $main_logo_path_name = $settings->main_logo;
            }
            else
            {
                $main_logo_path_name = NULL;
            }

        }

        //fav icon
        if($fev_icon = $request->file('fev_icon'))
        {
            $request->validate([
                'image' => ['mimes:jpeg,png,jpg', 'max:500'],
            ]);

            if(!empty($settings) && file_exists(public_path($settings->fev_icon)))
            {
                @unlink($settings->fev_icon);
            }
            $fev_icon_path = public_path('images/logo/');
            $fev_icon_name= rand(100000, 999999)."fev_icon." . $fev_icon->getClientOriginalExtension();
            $fev_icon->move($fev_icon_path, $fev_icon_name);
            $fev_icon_path_name = 'images/logo/'.$fev_icon_name;
        }
        else
        {
            if(!empty($settings) && isset($settings->fev_icon))
            {
                $fev_icon_path_name = $settings->fev_icon;
            }
            else
            {
                $fev_icon_path_name = NULL;
            }

        }


        $matchThese = ['id' => 1];
        Setting::updateOrCreate($matchThese,[
            'title' => $request->title,
            'main_logo' => $main_logo_path_name,
            'fev_icon' => $fev_icon_path_name,
            'fb_link' => $request->fb_link,
            'in_link' => $request->in_link,
            'insta_link' => $request->insta_link,
            'youtube_link' => $request->youtube_link,
            'twitter_link' => $request->twitter_link,
        ]);

        Toastr::success('Settings us Save Successfully', 'Success!');
        return redirect()->back();
    }
}
