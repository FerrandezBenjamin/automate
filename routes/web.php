<?php

use App\Http\Controllers\AdminController;
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

    Route::get('/admin/dashboard', [AdminController::class, 'index_admin'])
        ->name('admin.dashboard');

    Route::get('/admin/new_groupe', [GroupController::class, 'new'])
        ->name('admin.new_groupe');

    Route::get('/admin/groupe_aleatoire', [GroupController::class, 'random'])
        ->name('admin.random_groupe');

    Route::get('/admin/gestion_groupe', [GroupController::class, 'gestion'])
        ->name('admin.gestion_groupe');

    Route::get('/admin/delete_groupe', [GroupController::class, 'delete_groupe'])
        ->name('group.delete');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    //Entrer dans un groupe 
    Route::get('/groupe/join', [GroupController::class, 'join'])
        ->name('joingroupe');

    Route::get('/groupe/quit', [GroupController::class, 'quit'])
        ->name('quitegroupe');
});

require __DIR__ . '/auth.php';
