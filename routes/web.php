<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\Admin\ParamController;
use App\Http\Controllers\Admin\MasterController;

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
//Guess Section
Route::get('/', function () {
    return view('Guess.Index');
})->name('homePage');

Route::get('/reservasi', function () {
    return view('Guess.Pages.Reservasi');
})->name('reservasiPage');

Route::get('/contact', function () {
    return view('Guess.Pages.Contact');
})->name('contactPage');

Route::get('/menu',[App\Http\Controllers\Guess\GuessController::class, 'showMenu'])->name('menuPage');

Route::get('/login', function () {
    return view('signin');
});

//Auth Section
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/forgot-password', [App\Http\Controllers\AuthController::class, 'showForgotPasswordForm'])->name('forgot-password.form');
Route::post('/forgot-password', [App\Http\Controllers\AuthController::class, 'sendResetLink'])->name('forgot-password');
ROute::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
//Auth Section

// Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'showDashboard'])->name('Admin.Pages.Dashboard');

//End Guess Section


//Admin Section
Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'showDashboard'])->name('AdminDashboard');
    
    //Menu Section
    Route::get('/admin/menu', [App\Http\Controllers\Admin\MasterController::class, 'showMenu'])->name('adminMenu');
    Route::get('/admin/menu/insert', [App\Http\Controllers\Admin\MasterController::class, 'showInsertMenuForm'])->name('showInsertMenuForm');
    Route::post('/admin/menu/insert',[App\Http\Controllers\Admin\MasterController::class, 'insertMenu'])->name('insertMenu');
    Route::get('/admin/menu/delete/{id}', [App\Http\Controllers\Admin\MasterController::class, 'deleteMenu'])->name('deleteMenu');
    Route::get('/admin/menu/edit/{id}', [App\Http\Controllers\Admin\MasterController::class, 'editMenu'])->name('editMenu');
    Route::get('/admin/menu/slider/{id}',[MasterController::class, 'manageSlider'])->name('manageSlider');
    //end Menu Section
    
    //Table Section
    Route::get('/admin/paramamer', [App\Http\Controllers\Admin\ParamController::class, 'showParameter'])->name('adminParam');
    
    // Route::get('/admin/menu÷', [AdminController::class, 'showDashboard']);

    //Order Section
    Route::get('/admin/order', [App\Http\Controllers\Admin\OrderController::class, 'showOrder'])->name('adminOrder');

    //Transaction Section
    Route::get('/admin/transaction', [App\Http\Controllers\Admin\TransactionController::class, 'showTransaction'])->name('adminTransaction');

    //Customer Section
    Route::get('/admin/customer', [App\Http\Controllers\Admin\AdminController::class, 'showCustomer'])->name('adminCustomer');

    //Contact Section
    Route::get('/admin/contact', [App\Http\Controllers\Admin\AdminController::class, 'showContract'])->name('adminContract');
});
    //end Admin Section


//API Section
Route::post('/get-param', [ParamController::class, 'getParam'])->name('api.getParam');
