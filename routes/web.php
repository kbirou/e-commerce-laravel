<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class,'home'])->name('home');
Route::get('/cart', [PagesController::class,'cart'])->name('cart');
Route::get('/wish-list', [PagesController::class,'wishlist'])->name('wishlist');
Route::get('/account', [PagesController::class,'account'])->name('account')->middleware('auth');
Route::get('/checkout', [PagesController::class,'checkout'])->name('checkout')->middleware('auth');
Route::get('/products/{id}', [PagesController::class,'product'])->name('product');

// Cart
Route::post('/add-to-cart/{id}', [CartController::class,'addToCart'])->name('addToCart');
Route::post('/remove-from-cart/{id}', [CartController::class,'removeFromCart'])->name('removeFromCart');


// auth
Route::get('/login', [AuthController::class,'showLogin'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class,'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class,'postRegister'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class,'postLogin'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');

// admin
Route::group(['prefix'=>'adminpanel','middleware'=>'admin'],function(){
    Route::get('/', [AdminController::class,'dashboard'])->name('adminpanel');
    // CRUD Products
    Route::group(['prefix'=>'products'],function(){
        Route::get('/', [ProductController::class,'index'])->name('adminpanel.products');
        Route::get('/create', [ProductController::class,'create'])->name('adminpanel.products.create');
        Route::post('/create', [ProductController::class,'store'])->name('adminpanel.products.store');
        Route::get('/{id}', [ProductController::class,'edit'])->name('adminpanel.products.edit');
        Route::put('/{id}', [ProductController::class,'update'])->name('adminpanel.products.edit');
        Route::delete('/{id}', [ProductController::class,'destroy'])->name('adminpanel.products.destroy');
    });
    // CRUD Categoris
    Route::group(['prefix'=>'categories'],function(){
        Route::get('/', [CategoryController::class,'index'])->name('adminpanel.categories');
        Route::post('/', [CategoryController::class,'store'])->name('adminpanel.category.store');
        Route::delete('/{id}', [CategoryController::class,'destroy'])->name('adminpanel.category.destroy');
       
    });
    // CRUD Categoris
    Route::group(['prefix'=>'colors'],function(){
        Route::get('/', [ColorController::class,'index'])->name('adminpanel.colors');
        Route::post('/', [ColorController::class,'store'])->name('adminpanel.color.store');
        Route::delete('/{id}', [ColorController::class,'destroy'])->name('adminpanel.color.destroy');
       
    });
});
// Route::get('/adminpanel', [AdminController::class,'dashboard'])->name('adminpanel')->middleware('admin');
