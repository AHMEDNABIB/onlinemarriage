<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //dashboard
    public function index()
    {
        return view('admin.dashboard');
    }
}
