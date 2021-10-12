<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

// Rodo tuscia naujos knygos forma
Route::get('/books/create', [BookController::class, 'create'])->name('book_create');

// Irasdo knyga i db
Route::post('/books/store', [BookController::class, 'store'])->name('book_store');

// Rodo knygu sarasa
Route::get('/books', [BookController::class, 'index'])->name('book_index');
