<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('go', [PiController::class, 'go']);

Route::post('go', [PiController::class, 'startPayment'])->name('start-payment');

Route::prefix('paysera')->name('paysera_')->group(function () {
    Route::get('/accept', [PiController::class, 'accept'])->name('accept');
    Route::get('/cancel', [PiController::class, 'cancel'])->name('cancel');
    Route::get('/callback', [PiController::class, 'callback'])->name('callback');
    Route::get('/thank-you', [PiController::class, 'thankYou'])->name('thank_you');
    
});

