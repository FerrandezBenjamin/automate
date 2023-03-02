<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Models\Admin;

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

    Route::get('/admin/gestion_user', [AdminController::class, 'admin_user'])
        ->name('admin.gestion_user');

    Route::get('/admin/gestion_groupe', [AdminController::class, 'admin_gestion_groupe'])
        ->name('admin.gestion_groupe');

    Route::get('/admin/new_groupe', [AdminController::class, 'admin_new_groupe'])
        ->name('admin.new_groupe');

    Route::get('/admin/groupe_aleatoire', [AdminController::class, 'admin_groupe_random'])
        ->name('admin.random_groupe');

    Route::get('/admin/delete_groupe', [AdminController::class, 'admin_delete_groupe'])
        ->name('admin.group_delete');

    Route::get('/admin/delete_user', [AdminController::class, 'admin_delete_user'])
        ->name('admin.user_delete');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    //Entrer dans un groupe 
    Route::get('/groupe/join', [GroupController::class, 'join_groupe'])
        ->name('joingroupe');

    Route::get('/groupe/quit', [GroupController::class, 'quite_groupe'])
        ->name('quitegroupe');
});

require __DIR__ . '/auth.php';
