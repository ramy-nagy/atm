<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Livewire\ShowUser;

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

 Route::redirect('/', '/home', 301);
Route::get('/home',     function (){
    return view('home');
})->name('home');


// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'admin'])->name('admin.dashboard');

Route::middleware(['auth'])->group( function() {
    // users
        Route::name('user.')->prefix('user')->middleware(['user'])->group(function () {
        Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
        Route::resource('withdraw', 'App\Http\Controllers\WithdrawController');
        Route::resource('deposit', 'App\Http\Controllers\DepositController');
        Route::resource('transaction', 'App\Http\Controllers\TransactionController');
        Route::post('/update-password', [UserController::class, 'update'])->name('update.password');

    });
        // admins
    Route::name('admin.')->prefix('admin')->middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard'); 
        Route::put('/make-admin/{id}', [AdminController::class, 'update'])->name('update'); 
        Route::resource('user', 'App\Http\Controllers\Admin\AdminController');
        //Route::get('/user/{id?}', ShowUser::class)->name('user.show');



    });


});
require __DIR__.'/auth.php';
