<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\paymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can   web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


############################ report Routes ###############################
Route::get('reportwork/report', [ReportController::class, 'report'])->name('reportwork.report');
Route::post('reportwork/daterange', [ReportController::class, 'daterange'])->name('reportwork.daterange');
Route::get('wifi/{slug}', [ReportController::class, 'wifiCount'])->name('wifi');


// ############################ payment Routes ###############################
// Route::get('payment', [paymentController::class, 'view'])->name('payment');
// Route::post('/create-payment', [paymentController::class,'create'])->name('create');
// Route::post('/store-payment', [paymentController::class,'payment'])->name('storepayment');

Route::get('razorpay-payment', [paymentController::class, 'index'])->name('payment');
Route::post('razorpay-payment', [paymentController::class, 'store'])->name('razorpay.payment.store');