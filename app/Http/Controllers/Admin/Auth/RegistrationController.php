<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Toastr;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('admin.auth.register');
    }


    public function adminCreate(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'roles' => 'string|required',
            'email' => 'email|required|unique:admins',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Admin::create([
            'name' => $request['name'],
            'roles' => $request['roles'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        Toastr::success('Saved Successfully', 'Success!');
        return redirect()->route('admin.allAdmin');
    }

    public function allAdmin()
    {
        $alladmin = Admin::where('trash', 1)->get();
        return view('admin.auth.allAdmin', compact('alladmin'));
    }

    public function edit($id)
    {
        $data = Admin::where('id', $id)->first();
        return view('admin.auth.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
        ]);

        Admin::where('id', $id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        Toastr::success('Update Successfully', 'Updated!');
        return redirect()->back();
    }

    public function trash($id)
    {
        Admin::where('id', $id)->update([
            'trash' => '0'
        ]);
        Toastr::warning('Trash Successfully', 'Trash!');
        return redirect()->back();
    }

    public function trashList()
    {
        $alladmin = Admin::where('trash', 0)->get();
        return view('admin.auth.trash_list', compact('alladmin'));
    }

    public function restore($id)
    {
        Admin::where('id', $id)->update([
            'trash' => '1'
        ]);
        Toastr::info('Restore Successfully', 'Restore!');
        return redirect()->back();
    }

    public function delete($id)
    {
        Admin::where('id', $id)->delete();
        Toastr::warning('Delete Parmanently Successfully', 'Deleted!');
        return redirect()->back();
    }
}
