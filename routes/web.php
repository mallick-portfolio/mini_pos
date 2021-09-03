<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserSalesController;






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

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('confirmLogin');

Route::middleware(['auth'])->group(function () {
    
    Route::get('dashboard', function () {
        return view('welcome');
    });


    Route::get('groups', [UserGroupsController::class, 'index']);
    Route::get('groups/create', [UserGroupsController::class, 'create']);
    Route::post('groups', [UserGroupsController::class, 'store']);
    Route::delete('groups/{id}', [UserGroupsController::class, 'destroy']);


    Route::resource('users', UserController::class);


    Route::resource('categories', ProductCategoryController::class, ['except' => ['show', 'edit', 'update']]);


    Route::resource('products', ProductController::class);

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('users/{id}/sales', [UserSalesController::class, 'index'])->name('users.sales');

    Route::get('users/{id}/purchases', [UserPurchasesController::class, 'index'])->name('users.purchases');

    Route::get('users/{id}/payments', [UserPaymentsController::class, 'index'])->name('users.payments');
    Route::post('users/{id}/payments', [UserPaymentsController::class, 'store'])->name('users.payments.store');
    Route::delete('users/{id}/payments/{payment_id}', [UserPaymentsController::class, 'destroy'])->name('users.payments.destroy');



    Route::get('users/{id}/receipts', [UserReceiptsController::class, 'index'])->name('users.receipts');
    Route::post('users/{id}/receipts', [UserReceiptsController::class, 'store'])->name('users.receipts.store');
    Route::delete('users/{id}/receipts/{receipt_id}', [UserReceiptsController::class, 'destroy'])->name('users.receipts.destroy');


});

