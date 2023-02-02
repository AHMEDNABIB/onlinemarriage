<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\RegistrationController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\FactoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductRangeController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\SliderController;
//use App\Http\Controllers\Admin\Payment\RocketPaymentApiController;

// use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\TVCController;
use App\Http\Controllers\Admin\DivorceController;
 use App\Models\Product;
 use Illuminate\Support\Facades\Route;

// Route::get('/get-sub-category', [SubCategoryController::class, 'getSubCategory']);

Route::prefix('admin')->name('admin.')->group(function(){
    // Route::get('/', function () {
    //     return redirect()->route('admin.home');
    // });
    //Auth::routes(['register' => false]);
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'admin.auth.login')->name('login');
        Route::post('/login', [AuthController::class, 'store']);
        Route::get('/password/reset', [ForgotPasswordController::class, 'emailForm'])->name('password.reset');
        Route::post('/send/email', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('send.email');
        Route::get('/fotgot/password/link/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
        //update password
        Route::post('/update/password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('password.update');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

        Route::middleware('isSuperAdmin')->group(function () {
            //admin create,update,delete
            Route::get('/create', [RegistrationController::class, 'index'])->name('create');
            Route::post('/create/save', [RegistrationController::class, 'adminCreate'])->name('store');
            Route::get('/all-admin', [RegistrationController::class, 'allAdmin'])->name('allAdmin');
            Route::get('/trash-list', [RegistrationController::class, 'trashList'])->name('trashList');
            Route::get('/trash/{id}', [RegistrationController::class, 'trash'])->name('trash');
            Route::get('/restore/{id}', [RegistrationController::class, 'restore'])->name('restore');
            Route::get('/delete/{id}', [RegistrationController::class, 'delete'])->name('delete');
        });







        //contact us
        Route::get('/contact-us', [ContactUsController::class, 'add'])->name('contact_us');
        Route::post('/contact-us/save', [ContactUsController::class, 'store'])->name('contact_us.store');
        //settings
        Route::get('/settings', [SettingsController::class, 'add'])->name('settings');
        Route::post('/settings/save', [SettingsController::class, 'store'])->name('settings.store');


        //shop
        Route::get('/shop/index', [ShopController::class, 'index'])->name('shop.index');
        Route::get('/shop/add', [ShopController::class, 'add'])->name('shop.add');
        Route::post('/shop/save', [ShopController::class, 'store'])->name('shop.store');
        Route::get('/shop/edit/{id}', [ShopController::class, 'edit'])->name('shop.edit');
        Route::post('/shop/update/{id}', [ShopController::class, 'update'])->name('shop.update');
        Route::get('/shop/delete/{id}', [ShopController::class, 'delete'])->name('shop.delete');
        Route::get('/shop/trash-list', [ShopController::class, 'trash_list'])->name('shop.trash_list');
        Route::get('/shop/restore/{id}', [ShopController::class, 'restore'])->name('shop.restore');
        Route::get('/shop/forceDelete/{id}', [ShopController::class, 'forceDelete'])->name('shop.forceDelete');

        // Divorce

        // Route::get('/divorce/add', DivorceController::class, 'add')->name('divorce.add');

        //  Route::get('divorce/add', 'DivorceController@add');

        Route::get('divorce/add', [\App\Http\Controllers\Admin\DivorceController::class, 'add'])->name('divorce.add');
        Route::post('divorce/save', [\App\Http\Controllers\Admin\DivorceController::class, 'save'])->name('divorce.save');
        Route::resource('divorce', \App\Http\Controllers\Admin\DivorceController::class);


          //   Remarriage
          Route::post('marriage/permission', [\App\Http\Controllers\Admin\MarriageController::class, 'permission'])->name('marriage.permission');
          Route::post('marriage/divorce', [\App\Http\Controllers\Admin\MarriageController::class, 'divorce'])->name('marriage.divorce');
          Route::post('marriage/death', [\App\Http\Controllers\Admin\MarriageController::class, 'add'])->name('marriage.add');

        // Marriage
          Route::post('marriage/add', [\App\Http\Controllers\Admin\MarriageController::class, 'add'])->name('marriage.add');
        Route::resource('marriage', \App\Http\Controllers\Admin\MarriageController::class);
       
      


    });

});

  


