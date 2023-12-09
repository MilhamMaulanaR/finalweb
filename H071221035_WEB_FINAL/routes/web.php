<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FavoritesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductsController::class, 'get_random_products'])->name('home');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductsController::class, 'get_all_products']);
// Route::post('/products/add', 'ProductsController@addToCart')->name('addToCart');
// Route::resource('/product', ProductsController::class);
Route::get('/products/{value}', [ProductsController::class, 'get_details']);

Route::resource('/product', TokoController::class);
Route::get('/items/listproduct', [TokoController::class, 'list']);

Route::resource('/users', AdminController::class);
Route::resource('/carts', CartsController::class);

Route::post('/add-to-cart/{productId}', [CartsController::class, 'addToCart'])->name('carts.addToCart');
Route::get('/add-to-cart', [CartsController::class, 'index'])->name('carts.index');
Route::post('/delete-from-cart/{productId}', [CartsController::class, 'cartDelete'])->name('carts.delete');

Route::resource('/favorites', FavoritesController::class);
Route::post('/add-to-favorite/{productId}', [FavoritesController::class, 'addToFavorite'])->name('favorite.addToFavorite');
Route::get('/add-to-favorite', [FavoritesController::class, 'index'])->name('favorite.index');
Route::post('/delete-from-favorite/{productId}', [FavoritesController::class, 'favoriteDelete'])->name('favorite.delete');

Route::group(['prefix' => 'seller', 'middleware' => ['seller']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user');
});