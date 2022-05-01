<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OderManagementController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ContactController;



Route::group(['prefix' => 'admin','middleware'=>['auth','is_admin']], function () {

    Route::get('/', [HomeController::class,'index'])->name('admin.home');

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('user', UserController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('order-management', OderManagementController::class);
    Route::resource('role', RoleController::class);
    Route::resource('contact', ContactController::class);

});