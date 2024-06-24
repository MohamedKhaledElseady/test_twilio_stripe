<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('send-message' , [SmsController::class , 'sendSms'])->name('sendSmsMessage');
Route::get('  ' , [SmsController::class , 'showForm']);


Route::post('/create-checkout-session', [StripeController::class , 'pay']);
Route::get('/Checkout-Form', [StripeController::class , 'ShowCheckoutForm']);
