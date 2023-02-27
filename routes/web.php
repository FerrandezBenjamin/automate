<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupeController;

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
    return view('welcome');
});

Route::get('/groupe/liste', [GroupeController::class, 'index']);
Route::get('/groupe/ajout', [GroupeController::class, 'ajout_groupe']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
