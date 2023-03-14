<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Fasades\Auth;
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
// Route::get('/page', function () {
//     return view('page');
// });

// Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    Route::resource('books',App\Http\Controllers\Account\BooksController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/books{uuid}/download', 'BookContoller@download')->name('books.download');