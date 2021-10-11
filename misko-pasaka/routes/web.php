<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaTuController;
use App\Http\Controllers\CController;
use App\Http\Controllers\ShController;

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

Route::get('/c/{action}/{var1}/{var2}', [CController::class, 'calculator']);
Route::get('/c2', [CController::class, 'calculator2'])->name('c2');
Route::get('/circles', [CController::class, 'circles'])->name('circles');

Route::get('/color-form', [CController::class, 'colorForm'])->name('jonas');



Route::get('/cf', [CController::class, 'showColorForm'])->name('show_color_form');
Route::post('/cf-post', [CController::class, 'doColorForm'])->name('do_color_form');


Route::get('/ccc', [CController::class, 'showCalcForm'])->name('show_calc_form');
Route::post('/ccc', [CController::class, 'doCalcForm'])->name('do_calc_form');


Route::get('/shape', [ShController::class, 'showShapeForm'])->name('show_shape_form');
Route::post('/shape', [ShController::class, 'doShapeForm'])->name('do_shape_form');

