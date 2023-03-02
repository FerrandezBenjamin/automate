<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;

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

Route::get('/', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');


Route::middleware(['auth', 'role:administrator'])->group(function () {

    Route::get('/groupe/nouveau', [GroupController::class, 'new'])
        ->name('group.new');

    Route::get('/groupe/aleatoire', [GroupController::class, 'random'])
        ->name('group.random');

    Route::get('/groupe/gestion', [GroupController::class, 'gestion'])
        ->name('group.gestion');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    //Entrer dans un groupe 
    Route::get('/groupe/join', [GroupController::class, 'join'])
        ->name('joingroupe');

    Route::get('/groupe/quit', [GroupController::class, 'quit'])
        ->name('quitegroupe');
});

require __DIR__ . '/auth.php';
