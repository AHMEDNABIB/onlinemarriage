<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Award;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Client;
use App\Models\Factory;
use App\Models\Message;
use App\Models\Page;
use App\Models\Partner;
use App\Models\ProducatRange;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Subscribe;
use App\Models\TVC;
use Illuminate\Http\Request;
use Toastr;

class HomeController extends Controller
{

    //index page
    public function index()
    {
         return view('admin.auth.login');
        // return view('home');
    }

}
