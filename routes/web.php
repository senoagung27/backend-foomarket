<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
// use App\Http\Controllers\FoodController;

Route::get('/', function() {
    return redirect(route('dashboard'));
});

Route::get('home', function() {
    return redirect(route('dashboard'));
});

Route::middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    Route::get('users/roles', 'UserController@index')->name('users');
    Route::get('users/roles/edit', 'UserController@edit')->name('users.edit');
    Route::get('food', 'FoodController@index')->name('food.index');
    Route::get('food/create', 'FoodController@create')->name('food.create');
    Route::get('food/store', 'FoodController@create')->name('food.store');
    Route::get('food/edit/{food}', 'FoodController@edit')->name('food.edit');
    Route::get('food/update', 'FoodController@update')->name('food.update');
    Route::delete('food/destroy{id}', 'FoodController@destroy')->name('food.destroy');
    // Route::resource('food', FoodController::class);
    // Route::resource('food', 'FoodController')->name('food.index');
    // Route::resource('food', 'FoodController')->except([
    //    'index', 'create', 'store', 'update', 'destroy'
    // ]);
    // Route::resource('food', 'FoodController')->names([
    //     'index' => 'food.index'
    // ]);
    // Route::get('food', [FoodController::class, 'index'])->name('admin.food');
    // Route::post('food/crete', [FoodController::class, 'create'])->name('food.create');
    // Route::resource('food', 'FoodController')->only([
    //     'index','create'
    // ]);
    // Route::resource('food', 'FoodController', [
    //     'names' => [
    //         'index' => 'food',
    //     ]
    // ]);

    // Route::resource('food', FoodController::class);
    // Route::resource('users', 'UserController', [
    //     'names' => [
    //         'index' => 'users'
    //     ]
    // ]);
});

Route::middleware('auth')->get('logout', function() {
    Auth::logout();
    return redirect(route('login'))->withInfo('You have successfully logged out!');
})->name('logout');

Auth::routes(['verify' => true]);

Route::name('js.')->group(function() {
    Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
});

// Get authenticated user
Route::get('users/auth', function() {
    return response()->json(['user' => Auth::check() ? Auth::user() : false]);
});
