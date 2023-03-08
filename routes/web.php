<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;

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



Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/category/{category:name}/ads', [PublicController::class, 'adsByCategory'])->name('category.ads');


Route::get('/ads/create', [AdController::class,'create'])->name('ads.create');
Route::get('/ads/{ad}', [AdController::class,'show'])->name('ads.show');



Route::middleware(['auth'])->group(function(){
    Route::get('/revisor/become', [RevisorController::class,'becomeRevisor'])->name('revisor.become');
    Route::get('/revisor/{user}/make',  [RevisorController::class,'makeRevisor'])->name('revisor.make');
});

Route::middleware(['isAdmin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    Route::patch('/admin/revisor/{revisor}/accept', [AdminController::class, 'acceptRevisor'])->name('admin.revisor.accept');
    Route::patch('/admin/revisor/{revisor}/reject', [AdminController::class, 'rejectRevisor'])->name('admin.revisor.reject');
});


Route::middleware(['isRevisor'])->group(function(){
    Route::get('/revisor', [RevisorController::class, 'index'])->name('revisor.home');
    Route::patch('/revisor/ad/{ad}/accept', [RevisorController::class, 'acceptAd'])->name('revisor.ad.accept');
    Route::patch('/revisor/ad/{ad}/reject', [RevisorController::class, 'rejectAd'])->name('revisor.ad.reject');
});

Route::post('/locale/{locale}', [PublicController::class, 'setLocale'])->name('locale.set');

// FOOTER
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/privacy', [PublicController::class, 'privacy'])->name('privacy');
Route::get('/conditions', [PublicController::class, 'conditions'])->name('conditions');


