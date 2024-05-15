<?php

use App\Helper\Cart;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RigesterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//  controller
Route::resource('/', HomeController::class, ['names' => 'home']);
Route::get('/search', [HomeController::class, 'search'])->name('search-home');
Route::get('/page-show/{id}', [HomeController::class, 'show'])->name('home-show-page');
Route::resource('/products', ProductController::class, ['names' => 'product-index']);
Route::resource('/about', AboutController::class, ['names' => 'about-index']);
Route::resource('/contact', ContactController::class, ['names' => 'contact-index']);
// Route::get('/rigester', [RigesterController::class, ['name' => 'home.register']]);
// phan trang
// Route::get('/phan-trang', HomeController::class, ['name' => 'phantran-home']);

// cart
Route::post('/add-to-card/{id}', [CardController::class, 'addToCard'])->name('add-to-card');
Route::get('/page-card', [CardController::class, 'showCard'])->name('page-card');
Route::delete('/delete-card/{id}', [CardController::class, 'deleteCard'])->name('delete-card');
Route::put('/update-card/{id}', [CardController::class, 'updateCard'])->name('update-card');



// router admin
Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', App\Http\Controllers\Admin\UserController::class, ['names' => 'admin.users']);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class, ['names' => 'admin.products']);
    Route::resource('orders', App\Http\Controllers\admin\OrderController::class, ['names' => 'admin.orders']);
    Route::resource('order-items', App\Http\Controllers\admin\OrderItemController::class, ['names' => 'admin.order-items']);
    Route::resource('categoies', App\Http\Controllers\admin\CategoryController::class, ['names' => 'admin.categories']);
});
