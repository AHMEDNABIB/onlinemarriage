<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $admin = Admin::where('email', $request->email)->where('trash', '1')->first();
        if(!empty($admin))
        {
            if(!Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember')))
            {
                throw ValidationException::withMessages([
                    'email' => 'Invalid email or password'
                ]);
            }

            return redirect()->intended(route('admin.dashboard'));
        }
        else
        {
            return redirect()->back()->with(['message' => 'Invalid email or password']);
        }

    }

    public function destroy(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
