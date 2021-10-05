<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaTuController;

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

// Route::get('ka-tu', function () {
//     return '<h1>as miegu</h1>';
// });

Route::get('/ka-tu', [KaTuController::class, 'kaNoriuTaIrRasau']);

Route::get('/labas/{vardas}', [KaTuController::class, 'labas']);

Route::get('/calculator/{pirmas}', [KaTuController::class, 'calc']);

Route::get('/misko-pasaka/{title?}', [KaTuController::class, 'mk']);

Route::get('/color/{c}', [KaTuController::class, 'plusCounter']);

// Route::get('labas/jonai', function () {
//     return '<h1>Hello</h1>';
// });

Route::get('/squares/{c1?}/{c2?}/{c3?}/{c4?}/{c5?}', [KaTuController::class, 'squares']);
