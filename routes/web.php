<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiveawayController;
use App\Http\Controllers\ParticipantController;

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
// home page
Route::get('/', function () {
    return view('home');
});

// GIVEAWAY ROUTES
// show all giveaways
Route::get('/giveaways', [GiveawayController::class, 'index'])->name('giveaways.index');
// show form to create new giveaway
Route::get('/giveaways/create', [GiveawayController::class, 'create'])->name('giveaways.create');
// persist new giveaway
Route::post('/giveaways', [GiveawayController::class, 'store'])->name('giveaways.store');
// show specific giveaway
Route::get('/giveaways/{giveaway}', [GiveawayController::class, 'show'])->name('giveaways.show');
// show form to edit giveaway
Route::get('/giveaways/{giveaway}/edit', [GiveawayController::class, 'edit'])->name('giveaways.edit');
// persist updated giveaway
Route::put('/giveaways/{giveaway}', [GiveawayController::class, 'update'])->name('giveaways.update');
// delete giveaway
Route::delete('/giveaways/{giveaway}', [GiveawayController::class, 'destroy'])->name('giveaways.destroy');

// PARTICIPANT ROUTES
// show all giveaway participants
Route::get('/giveaways/{giveaway}/participants', [ParticipantController::class, 'index'])->name('participants.index');
// show form to add new participants (giveaway will be pulled from wildcard)
Route::get('/giveaways/{giveaway}/participants/create', [ParticipantController::class, 'create'])->name('participants.create');
// persist new participants
Route::post('/giveaways/{giveaway}/participants', [ParticipantController::class, 'store'])->name('participants.store');
// show specific participant
Route::get('/giveaways/{giveaway}/participants/{participant}', [ParticipantController::class, 'show'])->name('participants.show');
// show form to edit participant
Route::get('/giveaways/{giveaway}/participants/{participant}/edit', [ParticipantController::class, 'edit'])->name('participants.edit');
// persist updated participant
Route::put('/giveaways/{giveaway}/participants/{participant}', [ParticipantController::class, 'update'])->name('participants.update');
// delete participant
Route::delete('/giveaways/{giveaway}/participants/{participant}', [ParticipantController::class, 'destroy'])->name('participants.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
