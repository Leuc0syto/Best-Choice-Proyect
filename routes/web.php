<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
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

Route::get('/revisor', [RevisorController::class,'index'])->name('revisor.home');

// FOOTER
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/privacy', [PublicController::class, 'privacy'])->name('privacy');
Route::get('/conditions', [PublicController::class, 'conditions'])->name('conditions');