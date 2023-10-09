<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MemberController;
use App\Http\Controllers\GroceryItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SalesRecordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::resource('members', MemberController::class);
Route::get('/search/members', [MemberController::class, 'search'])->name('members.search');

Route::resource('items', GroceryItemController::class);
Route::get('/search/items', [GroceryItemController::class, 'search'])->name('items.search');

Route::resource('transactions', TransactionController::class);

Route::resource('sales', SalesRecordController::class);
Route::get('sales/{date}', [SalesRecordController::class, 'show']);

Route::resource('reports', ReportController::class);
