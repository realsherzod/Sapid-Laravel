<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompletedController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Route:: resource('forgotpassword', PasswordResetLinkController::class );

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('customer', function () {
        return view('customer');
    });
    Route::resource('categories', CategoryController::class);
    Route::resource('foods', FoodController::class);
    Route::resource('sends', SendController::class);
    Route:: resource('completeds', CompletedController::class );
    
});

Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return back();
})->name('language');

Route::get(uri: '/chat', action:'App\Http\Controllers\PusherController@index');
Route::post(uri: '/broadcast', action:'App\Http\Controllers\PusherController@broadcast');
Route::post(uri: '/receive', action:'App\Http\Controllers\PusherController@receive');

require __DIR__ . '/auth.php';
