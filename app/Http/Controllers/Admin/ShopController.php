<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Toastr;

class ShopController extends Controller
{
    public function index()
    {
        $all_shop = Shop::all();
        return view('admin.shop.index', compact('all_shop'));
    }

    public function add()
    {
        return view('admin.shop.add');
    }

    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'name' => 'required',
            //'phone' => 'required',
            //'address' => 'required',
            'image' => ['required', 'mimes:jpeg,png,jpg,', 'max:500'],
        ]);

        $image = $request->file('image');
        $image_path = public_path('images/shop/');
        $image_name = rand(100000, 999999)."shop." . $image->getClientOriginalExtension();
        $image->move($image_path, $image_name);
        $image_name_path = 'images/shop/'.$image_name;

        Shop::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'url' => $request->url,
            'address' => $request->address,
            'image' =>  $image_name_path
        ]);

        Toastr::success('Slider Save Successfully', 'Success!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = Shop::find($id);
        return view('admin.shop.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            //'phone' => 'required',
            //'address' => 'required',
        ]);



        $data = Shop::find($id);
        //image
        if($image = $request->file('image'))
        {
            $request->validate([
                'image' => ['required', 'mimes:jpeg,png,jpg,', 'max:500'],
            ]);

            if(file_exists(public_path($data->image)))
            {
                @unlink($data->image);
            }

            $image_path = public_path('images/shop/');
            $image_name = rand(100000, 999999)."shop." . $image->getClientOriginalExtension();
            $image->move($image_path, $image_name);
            $image_name_path = 'images/shop/'.$image_name;
        }
        else
        {
            $image_name_path = $data->image;
        }


        Shop::withTrashed()->find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'url' => $request->url,
            'image' =>  $image_name_path
        ]);

        Toastr::success('Shop update Successfully', 'Updated!');
        return redirect()->back();
    }

    public function delete($id)
    {
        Shop::findOrFail($id)->delete();
        Toastr::warning('Shop delete Successfully', 'Deleted!');
        return redirect()->back();
    }

    public function trash_list()
    {
        $all_shop = Shop::onlyTrashed()->get();
        return view('admin.shop.trash', compact('all_shop'));
    }



    public function restore($id)
    {
        Shop::withTrashed()->where('id', $id)->restore();
        Toastr::success('Shop restore Successfully', 'Restore!');
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        Shop::onlyTrashed()->findOrFail($id)->forceDelete();
        Toastr::warning('Shop Permanently delete Successfully', 'Deleted!');
        return redirect()->back();
    }
}
