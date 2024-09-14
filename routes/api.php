<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('forget-password', [ForgetPasswordController::class, 'sendResetLinkEmail']);
    Route::post('reset-password', [ForgetPasswordController::class, 'reset'])->name('password.reset');
});
Route::group(['middleware' => ['auth:sanctum','ability:admin']], function() {
    Route::resource('products', ProductController::class);
    
});
