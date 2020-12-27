<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');
    // ->middleware('auth');

Route::prefix('admin')->group(function () {
  Route::get('/contacts', [ContactController::class, 'index'])->name('contact.list');
  Route::get('/contacts/create', [ContactController::class, 'create'])->name('contact.create');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
