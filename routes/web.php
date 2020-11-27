<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('dashboard');
});

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('is_admin');