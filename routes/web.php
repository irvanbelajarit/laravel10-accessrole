<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::middleware(['role:Admin'])->get('/dashboard', function () {

//     return 'dashboard';}
//     )->name('dashboard');

Route::group(['prefix' => 'dashboard','middleware' => ['auth']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


});


Route::group(['prefix' => 'dashboard/users','middleware' => ['auth']], function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
});
