<?php

//use App\Http\Controllers\Payment\RocketPaymentApiController;
//use App\Http\Controllers\Payment\SendboxPaymentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//rocket main payment api 
// Route::get('/rocket/payment/verify/{app_key}/{bill_id}', [RocketPaymentApiController::class, 
// 'paymentVerify']);
// Route::get('/rocket/payment/confirm/{app_key}/{bill_id}/{pay_mobile}/{trn}/{amount}/{payment_date}', [RocketPaymentApiController::class, 
// 'paymentConfirm']);

//rocket sendbox payment api for testing
// Route::get('/sandbox/rocket/payment/verify/{app_key}/{bill_id}', [SendboxPaymentApiController::class, 
// 'paymentVerify']);
// Route::get('/sandbox/rocket/payment/confirm/{app_key}/{bill_id}/{pay_mobile}/{trn}/{amount}/{payment_date}', [SendboxPaymentApiController::class, 
// 'paymentConfirm']);