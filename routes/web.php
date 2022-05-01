<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;

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

// Front End Route

/* Route Register   */
Route::get('register', [RegisterController::class,'register']);
Route::post('register', [RegisterController::class,'postRegister'])->name('postRegister');

/* Route Login   */
Route::get('login', [LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class,'postLogin'])->name('postLogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

/* Route Home Page  */
Route::get('/',[HomeController::class,'index'])->name('home');

/* Route Shop Page  */
Route::get('/product-detail/{slug}',[ProductController::class,'product_detail'])->name('product.detail');
Route::get('/shop',[ProductController::class,'all_product'])->name('product.all');
Route::get('/category/{slug}',[ProductController::class,'by_category'])->name('by_category');

/* Route About Page  */
Route::get('/contact',[ContactController::class,'index']);
Route::post('/contact',[ContactController::class,'sendContact'])->name('send.contact');

/* Route Blog Page  */
Route::get('/blog',[BlogController::class,'index']);
Route::get('/blog-detail/{slug}',[BlogController::class,'detail'])->name('blog.detail');

/* Route Contact Page  */
Route::get('/about',function(){
    return view('front-end.layouts.about');
});

/* Route Auth Page  */
Route::group(['middleware'=>'auth'], function () {

    /* Route Checkout Page  */
    Route::get('/checkout',[CheckoutController::class,'view_checkout']);
    Route::post('/checkout',[CheckoutController::class,'post_checkout'])->name('checkout.post');
    /* Route Carts Page  */
    Route::get('/shopping-cart',[CartController::class,'view_cart'])->name('cart.view');
    Route::post('/add-to-cart',[CartController::class,'add_product']);
    Route::post('/update-cart-item',[CartController::class,'update_cart_item']);
    Route::post('/delete-cart-item',[CartController::class,'delete_cart_item']);
    Route::post('/apply-coupon',[CartController::class,'apply_coupon'])->name('coupon.apply');
    Route::get('/remove-coupon',[CartController::class,'remove_coupon'])->name('remove_coupon');
    
});

/* Route Thank You Page  */
Route::get('thanks',function(){
    return view('front-end.thanks_shopping');
});

// TEST
Route::get('/category-product',[ProductController::class,'show_category_product'])->name('show_category_product');
