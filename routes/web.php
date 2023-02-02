<?php

use App\Http\Controllers\Frontend\HomeController;
// use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/admin.php';



Route::get('/',[HomeController::class, 'index'])->name('main.home');

Route::name('user.')->group(function(){

    
});


