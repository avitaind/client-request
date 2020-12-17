<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;

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

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('is_admin');


Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');

Route::get('/ticket/view-all', [TicketController::class, 'showTicket'])->name('ticket.show');


Route::get('/ticket/detail/{slug}', [TicketController::class, 'showTicketDetail'])->name('ticket.detail');

Route::get('/ticket/processing', [TicketController::class, 'showProcessing'])->name('ticket.processing');
Route::get('/processing/detail/{slug}', [TicketController::class, 'showProcessingDetail'])->name('processing.detail');


Route::get('/ticket/pending', [TicketController::class, 'showPending'])->name('ticket.pending');
Route::get('/pending/detail/{slug}', [TicketController::class, 'showPendingDetail'])->name('pending.detail');


Route::get('/ticket/closed', [TicketController::class, 'showClosed'])->name('ticket.closed');
Route::get('/closed/detail/{slug}', [TicketController::class, 'showClosedDetail'])->name('closed.detail');


Route::get('/ticket/rejected', [TicketController::class, 'showRejected'])->name('ticket.rejected');
Route::get('/rejected/detail/{slug}', [TicketController::class, 'showRejectedDetail'])->name('rejected.detail');



Route::post('/update-ticket/{id}', [TicketController::class, 'updateTicketDetail'])->name('ticket.update'); 
Route::post('/reject-request/{id}', [TicketController::class, 'rejection']);

