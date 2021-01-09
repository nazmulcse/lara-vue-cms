<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ContactReportController;
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

// Uses for setting up the language.
Route::get('{locale}/' . config('app.admin_route_prefix'), [LanguageController::class, 'setLocale'])->name('language');

/* Route::get('/', function () {
    return view('welcome');
}); */

    // ->middleware('auth');

Route::prefix(Request::segment(1) . config('app.admin_route_prefix'))->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/contacts', [ContactController::class, 'index'])->name('contact.list');
  Route::get('/contacts/create', [ContactController::class, 'create'])->name('contact.create');
  Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');
  Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
  Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contact.update');
  Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
  Route::get('/contacts/report', [ContactReportController::class, 'index'])->name('contact.report.create');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
