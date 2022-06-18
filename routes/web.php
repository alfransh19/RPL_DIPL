<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

// homepage
Route::get('/', function(){
    $books = Book::orderBy('title', 'asc')->filter(request(['search']));
        
    return view('home',[
        "title" => "Home",
        "books" => $books->paginate(12)->withQueryString()
    ]);
});

// Auth user
Route::get('/cart', [CartController::class, 'show'])->middleware('auth');

// Guest user
Route::get('/register', [RegisterController::class, 'show'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Admin user
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware("auth");

Route::resource('/dashboard/books', BookController::class)->middleware('auth');
Route::resource('/dashboard/books', BookController::class);
