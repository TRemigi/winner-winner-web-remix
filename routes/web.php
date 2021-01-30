<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiveawayController;
use App\Http\Controllers\ParticipantController;
use App\Models\Giveaway;

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
    return view('welcome');
});

// show all giveaways
Route::get('/giveaways', [GiveawayController::class, 'index'])->name('giveaways.index');

// CREATE
// show form to create new giveaway
Route::post('/giveaways', [GiveawayController::class, 'store'])->name('giveaways.store');
Route::get('/giveaways/create', [GiveawayController::class, 'create'])->name('giveaways.create');
// show form to add new participants (giveaway will be pulled from wildcard)
Route::get('/giveaways/{giveaway}/particpants', [ParticipantController::class, 'create'])->name('participants.create');

// READ
// show specific giveaway
Route::get('/giveaways/{giveaway}', [GiveawayController::class, 'show'])->name('giveaways.show');

// UPDATE
// show form to edit giveaway
Route::get('/giveaways/{giveaway}/edit', [GiveawayController::class, 'edit'])->name('giveaways.edit');
Route::put('/giveaways/{giveaway}', [GiveawayController::class, 'update'])->name('giveaways.update');


// DELETE
