<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;

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
    return redirect()->route('login');
});

Route::get('/send-email', function () {
    MailController::sendMail();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
    Route::resource('users', UserController::class)->except(['show']);
 
    Route::middleware(['restrictUserAdmin'])->group(function () 
    {
        Route::resource('categories', CategoryController::class);
        Route::get('/categories/{id}/details', [CategoryController::class, 'getCategoryDetails']);
        Route::resource('products', ProductController::class);
    });
});




