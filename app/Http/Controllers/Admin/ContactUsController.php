<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Toastr;

class ContactUsController extends Controller
{
    public function add()
    {
        $contact_us = ContactUs::first();
        return view('admin.contact_us.index', compact('contact_us'));
    }

    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'address' => 'required',
            'map' => 'required',
        ]);

        $matchThese = ['id' => 1];
        ContactUs::updateOrCreate($matchThese,[
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'description' => $request->description,
            'map' => $request->map,
        ]);

        Toastr::success('Contact us Save Successfully', 'Success!');
        return redirect()->back();
    }
}
