
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\DocumentController;

// PUBLIC CONTROLLERS
use App\Http\Controllers\Public\NewsController as PublicNewsController;
use App\Http\Controllers\Public\AnnouncementController as PublicAnnouncementController;
use App\Http\Controllers\Public\AgendaController as PublicAgendaController;
use App\Http\Controllers\Public\GalleryController as PublicGalleryController;
use App\Http\Controllers\Public\DocumentController as PublicDocumentController;


// ======================================================
// WEBSITE PUBLIK
// ======================================================

// Beranda
Route::view('/', 'public.home')
    ->name('home');

// Profil Desa
Route::view('/profil', 'public.profil')
    ->name('public.profile');

// Pengumuman
Route::get('/pengumuman', [PublicAnnouncementController::class, 'index'])
    ->name('public.announcements.index');

Route::get('/pengumuman/{slug}', [PublicAnnouncementController::class, 'show'])
    ->name('public.announcements.show');

// Agenda Kegiatan
Route::get('/agenda', [PublicAgendaController::class, 'index'])
    ->name('public.agendas.index');

Route::get('/agenda/{agenda}', [PublicAgendaController::class, 'show'])
    ->name('public.agendas.show');

// Berita
Route::get('/berita', [PublicNewsController::class, 'index'])
    ->name('public.news.index');

Route::get('/berita/{slug}', [PublicNewsController::class, 'show'])
    ->name('public.news.show');

// Galeri
Route::get('/galeri', [PublicGalleryController::class, 'index'])
    ->name('public.galleries.index');

// Layanan Surat
Route::get('/layanan-surat', [PublicDocumentController::class, 'index'])
    ->name('public.documents.index');

// Download Dokumen
Route::get('/layanan-surat/{document}/download', [
    PublicDocumentController::class,
    'download'
])->name('public.documents.download');

// Kontak
Route::view('/kontak', 'public.kontak')
    ->name('public.contact');


// ======================================================
// LOGIN ADMIN DAN EDITOR
// ======================================================

Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/admin/login', [AuthController::class, 'login'])
        ->name('admin.login');

});


// ======================================================
// DASHBOARD ADMIN DAN EDITOR
// ======================================================

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // --------------------------------------------------
    // BERITA DESA
    // --------------------------------------------------

    // Tambah kategori berita
    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::post('/news/upload-image', [NewsController::class, 'uploadImage'])
        ->name('news.upload-image');

    Route::resource('news', NewsController::class);


    // --------------------------------------------------
    // PENGUMUMAN DESA
    // --------------------------------------------------

    Route::post('/announcements/upload-image', [
        AnnouncementController::class,
        'uploadImage'
    ])->name('announcements.upload-image');

    Route::resource('announcements', AnnouncementController::class);


    // --------------------------------------------------
    // AGENDA KEGIATAN
    // --------------------------------------------------

    Route::resource('agendas', AgendaController::class);


    // --------------------------------------------------
    // GALERI DESA
    // --------------------------------------------------

    Route::resource('galleries', GalleryController::class);


    // --------------------------------------------------
    // LAYANAN SURAT
    // --------------------------------------------------

    Route::resource('documents', DocumentController::class);


    // --------------------------------------------------
    // LOGOUT
    // --------------------------------------------------

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});
