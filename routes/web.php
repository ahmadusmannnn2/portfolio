<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\CategoryController; // <-- Tambahkan ini
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ServiceController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // <-- Rute BARU
Route::get('/certificates', [HomeController::class, 'certificates'])->name('certificates.index');
Route::get('/service/{service:slug}', [HomeController::class, 'serviceDetail'])->name('service.detail');

// Area Admin, wajib login
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('categories', CategoryController::class);

    // Rute untuk Kelola Tampilan (BARU)
    Route::get('content', [ContentController::class, 'index'])->name('content.index');
    Route::post('content', [ContentController::class, 'update'])->name('content.update');
    // Rute untuk Pesan Masuk (BARU)
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    Route::resource('social_links', SocialLinkController::class);
    Route::resource('certificates', CertificateController::class);
    Route::resource('services', ServiceController::class);
});

// PERUBAHAN: Rute dashboard sekarang mengarahkan ke halaman portofolio
Route::get('/dashboard', function () {
    return redirect()->route('admin.portfolios.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';