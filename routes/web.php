
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Public\NewsController as PublicNewsController;

// ==========================================
// WEBSITE PUBLIK
// ==========================================

// Beranda
Route::view('/', 'public.home')->name('home');

// Daftar berita publik
Route::get('/berita', [PublicNewsController::class, 'index'])
    ->name('public.news.index');

// Detail berita publik
Route::get('/berita/{slug}', [PublicNewsController::class, 'show'])
    ->name('public.news.show');


// ==========================================
// LOGIN ADMIN DAN EDITOR
// ==========================================

Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/admin/login', [AuthController::class, 'login'])
        ->name('admin.login');

});


// ==========================================
// DASHBOARD ADMIN DAN EDITOR
// ==========================================

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Upload gambar untuk isi berita
    Route::post('/news/upload-image', [NewsController::class, 'uploadImage'])
        ->name('news.upload-image');

    // CRUD berita admin
    Route::resource('news', NewsController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});
