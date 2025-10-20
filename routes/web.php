<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/pengumuman', [PublicController::class, 'pengumuman'])->name('pengumuman');
Route::get('/pengumuman/{slug}', [PublicController::class, 'pengumumanDetail'])->name('pengumuman.detail');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PublicController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/prestasi', [PublicController::class, 'prestasi'])->name('prestasi');
Route::get('/prestasi/{slug}', [PublicController::class, 'prestasiDetail'])->name('prestasi.detail');
Route::get('/alumni', [PublicController::class, 'alumni'])->name('alumni');
Route::get('/ekstrakurikuler', [PublicController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/search', [PublicController::class, 'search'])->name('search');
Route::post('/contact', [PublicController::class, 'contactSubmit'])->name('contact.submit');

Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Routes
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Pengumuman Routes
    Route::get('/pengumuman', [AdminController::class, 'pengumumanIndex'])->name('pengumuman.index');
    Route::get('/pengumuman/create', [AdminController::class, 'pengumumanCreate'])->name('pengumuman.create');
    Route::post('/pengumuman', [AdminController::class, 'pengumumanStore'])->name('pengumuman.store');
    Route::get('/pengumuman/{pengumuman}/edit', [AdminController::class, 'pengumumanEdit'])->name('pengumuman.edit');
    Route::put('/pengumuman/{pengumuman}', [AdminController::class, 'pengumumanUpdate'])->name('pengumuman.update');
    Route::delete('/pengumuman/{pengumuman}', [AdminController::class, 'pengumumanDestroy'])->name('pengumuman.destroy');
    
    // Berita Routes
    Route::get('/berita', [AdminController::class, 'beritaIndex'])->name('berita.index');
    Route::get('/berita/create', [AdminController::class, 'beritaCreate'])->name('berita.create');
    Route::post('/berita', [AdminController::class, 'beritaStore'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [AdminController::class, 'beritaEdit'])->name('berita.edit');
    Route::put('/berita/{berita}', [AdminController::class, 'beritaUpdate'])->name('berita.update');
    Route::delete('/berita/{berita}', [AdminController::class, 'beritaDestroy'])->name('berita.destroy');
    
    // Prestasi Routes
    Route::get('/prestasi', [AdminController::class, 'prestasiIndex'])->name('prestasi.index');
    Route::get('/prestasi/create', [AdminController::class, 'prestasiCreate'])->name('prestasi.create');
    Route::post('/prestasi', [AdminController::class, 'prestasiStore'])->name('prestasi.store');
    Route::get('/prestasi/{prestasi}/edit', [AdminController::class, 'prestasiEdit'])->name('prestasi.edit');
    Route::put('/prestasi/{prestasi}', [AdminController::class, 'prestasiUpdate'])->name('prestasi.update');
    Route::delete('/prestasi/{prestasi}', [AdminController::class, 'prestasiDestroy'])->name('prestasi.destroy');
    
    // Alumni Routes
    Route::get('/alumni', [AdminController::class, 'alumniIndex'])->name('alumni.index');
    Route::get('/alumni/create', [AdminController::class, 'alumniCreate'])->name('alumni.create');
    Route::post('/alumni', [AdminController::class, 'alumniStore'])->name('alumni.store');
    Route::get('/alumni/{alumni}/edit', [AdminController::class, 'alumniEdit'])->name('alumni.edit');
    Route::put('/alumni/{alumni}', [AdminController::class, 'alumniUpdate'])->name('alumni.update');
    Route::delete('/alumni/{alumni}', [AdminController::class, 'alumniDestroy'])->name('alumni.destroy');
    
    // Ekstrakurikuler Routes
    Route::get('/ekstrakurikuler', [AdminController::class, 'ekstrakurikulerIndex'])->name('ekstrakurikuler.index');
    Route::get('/ekstrakurikuler/create', [AdminController::class, 'ekstrakurikulerCreate'])->name('ekstrakurikuler.create');
    Route::post('/ekstrakurikuler', [AdminController::class, 'ekstrakurikulerStore'])->name('ekstrakurikuler.store');
    Route::get('/ekstrakurikuler/{ekstrakurikuler}/edit', [AdminController::class, 'ekstrakurikulerEdit'])->name('ekstrakurikuler.edit');
    Route::put('/ekstrakurikuler/{ekstrakurikuler}', [AdminController::class, 'ekstrakurikulerUpdate'])->name('ekstrakurikuler.update');
    Route::delete('/ekstrakurikuler/{ekstrakurikuler}', [AdminController::class, 'ekstrakurikulerDestroy'])->name('ekstrakurikuler.destroy');
    
    // Contact Routes
    Route::get('/contact', [AdminController::class, 'contactIndex'])->name('contact.index');
    Route::get('/contact/{contact}', [AdminController::class, 'contactShow'])->name('contact.show');
    Route::delete('/contact/{contact}', [AdminController::class, 'contactDestroy'])->name('contact.destroy');
});