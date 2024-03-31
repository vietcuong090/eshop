<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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
Route::get('/home', function () {
    return 'Page Home';
})->name('home');
Route::get('/shop', function () {
    return 'Page shop';
})->middleware('checkAge');
Route::get('/about', function () {
    return 'Page about';
});
Route::get('/contact', function () {
    return 'Method post';
});
Route::get('/put', function () {
    return 'Method put';
});
Route::get('/put', function () {
    return 'Method put';
});
Route::prefix('admin')->group(function () {
    Route::get('posts/{post}/comments/{comment}', function ($postID, $commentId) {
        return "postId: $ postId - commentId: $commentId";
    });
    Route::get('user/{name?}', function ($name = 'John') {
        return $name;
    });
});
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderitems', OrderItemController::class);

Route::get('/child', function () {
    return view('child');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', App\Http\Controllers\Admin\UserController::class, ['names' => 'admin.users']); //['names' => 'admin.users'] được sử dụng để đặt tên cho các route được tạo ra
    Route::resource('products', App\Http\Controllers\ProductController::class, ['names' => 'admin.products']);
});
