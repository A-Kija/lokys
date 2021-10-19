<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

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
// Rodo uzpildyta forma, paruosta redagavimui
Route::get('/books/edit/{book}', [BookController::class, 'edit'])->name('book_edit');
// Uzsaugo redaguota knyga duomenu bazeje
Route::put('/books/update/{book}', [BookController::class, 'update'])->name('book_update');
// Trina knyga duomenu bazeje
Route::delete('/books/delete/{book}', [BookController::class, 'destroy'])->name('book_delete');
// Rodo pilna vienos knygos informacija
Route::get('/books/show/{book}', [BookController::class, 'show'])->name('book_show');


Route::prefix('authors')->name('author_')->group(function () {
    Route::get('/create', [AuthorController::class, 'create'])->name('create');
    Route::post('/store', [AuthorController::class, 'store'])->name('store');
    Route::get('/', [AuthorController::class, 'index'])->name('index');
    Route::get('/edit/{author}', [AuthorController::class, 'edit'])->name('edit');
    Route::put('/update/{author}', [AuthorController::class, 'update'])->name('update');
    Route::delete('/delete/{author}', [AuthorController::class, 'destroy'])->name('delete');
    Route::get('/show/{author}', [AuthorController::class, 'show'])->name('show');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
