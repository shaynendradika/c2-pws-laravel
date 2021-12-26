<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardBeritaController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('home', ["title" => "Home"]);
})->name('home');

Route::get('/about', function () {
    return view('about', ["title" => "About"]);
})->name('about');

Route::get('/news', [BeritaController::class, 'index'])->name('news');
Route::get('/news/{berita:slug}', [BeritaController::class, 'show'])->name('news_detail');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_post']);
    
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register_post']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/berita/checkslug', [DashboardBeritaController::class, 'checkSlug']);
    Route::resource('/dashboard/berita', DashboardBeritaController::class);
});