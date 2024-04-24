<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('homepage');
})->name('homepage');

Route::view('/legal', 'legal')->name('legal');

Route::middleware('auth', 'check.role')->group(function () {
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::delete('/event/{event}', [EventController::class, 'destroy'])->name('event.destroy');
    Route::get('/event/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{event}', [EventController::class, 'update'])->name('event.update');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
});
Route::get('/events/{event}/participants', [EventController::class, 'participants'])->name('event.participants');
Route::delete('/events/{event}/unparticipate', [EventController::class, 'unparticipate'])->name('event.unparticipate');
Route::post('/events/{event}/participate', [EventController::class, 'participate'])->name('event.participate');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');

Route::middleware('auth', 'check.role')->group(function () {
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('game.destroy');
    Route::get('/game/{game}/edit', [GameController::class, 'edit'])->name('game.edit');
    Route::put('/game/{game}', [GameController::class, 'update'])->name('game.update');
    Route::get('/game/create', [GameController::class, 'create'])->name('game.create');
    Route::get('/game/{id}', [GameController::class, 'show'])->name('game.show');
    Route::get('/game', [GameController::class, 'index'])->name('game');
    Route::post('/game', [GameController::class, 'store'])->name('game.store');
});



Route::middleware('auth', 'check.role')->group(
    function () {
        Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    }
);
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});
