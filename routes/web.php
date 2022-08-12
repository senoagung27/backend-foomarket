<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\API\MidtransController;

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
    return redirect()->route('admin-dashboard');
});

// Dashboard
// Route::prefix('dashboard')
//     ->middleware(['auth:sanctum','admin'])
//     ->group(function() {
//         Route::get('/', [DashboardController::class, 'index'])
//             ->name('admin-dashboard');
//         Route::resource('food', FoodController::class);
//         Route::resource('users', UserController::class);

//         Route::get('transactions/{id}/status/{status}', [TransactionController::class, 'changeStatus'])
//             ->name('transactions.changeStatus');
//         Route::resource('transactions', TransactionController::class);
//     });

// // Midtrans Related
// Route::get('midtrans/success', [MidtransController::class, 'success']);
// Route::get('midtrans/unfinish', [MidtransController::class, 'unfinish']);
// Route::get('midtrans/error', [MidtransController::class, 'error']);

Route::get('/', function () {
    return view('welcome');
});

Route::group([ "middleware" => ['auth:sanctum', 'admin'] ], function() {
    // Route::view('/dashboard', "dashboard")->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard');

    Route::resource('food', FoodController::class);
        Route::resource('users', UserController::class);

        Route::get('transactions/{id}/status/{status}', [TransactionController::class, 'changeStatus'])
            ->name('transactions.changeStatus');
        Route::resource('transactions', TransactionController::class);

    Route::get('/user', [ UserController::class, "index" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
});
Route::get('midtrans/success', [MidtransController::class, 'success']);
Route::get('midtrans/unfinish', [MidtransController::class, 'unfinish']);
Route::get('midtrans/error', [MidtransController::class, 'error']);
