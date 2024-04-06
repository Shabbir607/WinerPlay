<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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
Route::get('cache-clear', function () {
    Artisan::call('optimize:clear');
    request()->session()->flash('success', 'Successfully cache cleared.');
    return redirect()->back();
})->name('cache.clear');

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/product-details', [FrontendController::class, 'productdetails'])->name('product-details');
Route::get('user/login', [FrontendController::class, 'login'])->name('login.form');
Route::post('user/login', [FrontendController::class, 'loginSubmit'])->name('login.submit');
Route::get('user/logout', [FrontendController::class, 'logout'])->name('user.logout');

Route::get('user/register', [FrontendController::class, 'register'])->name('register.form');
Route::post('user/register', [FrontendController::class, 'registerSubmit'])->name('register.submit');
// Reset password0
// Route::post('password-reset', [FrontendController::class, 'showResetForm'])->name('password.reset');

Auth::routes();

Route::get('/dashboard', function (){
    return view('index');})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
// Product
    Route::get('/product' ,[ProductController::class, 'index'])->name('/product');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/product.create' ,[ProductController::class, 'create'])->name('/product.create');
    Route::post('/product.store' ,[ProductController::class, 'store'])->name('/product.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
// category
    Route::get('/category' ,[CategoryController::class, 'index'])->name('/category');
    Route::get('/category.create' ,[CategoryController::class, 'create'])->name('/category.create');
    Route::post('/category.store' ,[CategoryController::class, 'store'])->name('/category.store');
    Route::get('/category_edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

//brand
    Route::get('/brand' ,[BrandController::class, 'index'])->name('/brand');
    Route::get('/brand.create' ,[BrandController::class, 'create'])->name('/brand.create');
    Route::post('/brand.store' ,[BrandController::class, 'store'])->name('/brand.store');
    Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/brand/{id}/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');

});

Route::group(['prefix' => '/user', 'middleware' => ['user']],  function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');

    // Profile
    Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
    Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');
    //  Order
    Route::get('/order', "HomeController@orderIndex")->name('user.order.index');
    Route::get('/order/show/{id}', "HomeController@orderShow")->name('user.order.show');
    Route::delete('/order/delete/{id}', [HomeController::class, 'userOrderDelete'])->name('user.order.delete');
    // Product Review
    Route::get('/user-review', [HomeController::class, 'productReviewIndex'])->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}', [HomeController::class, 'productReviewDelete'])->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}', [HomeController::class, 'productReviewEdit'])->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}', [HomeController::class, 'productReviewUpdate'])->name('user.productreview.update');

    // Post comment
    Route::get('user-post/comment', [HomeController::class, 'userComment'])->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}', [HomeController::class, 'userCommentDelete'])->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}', [HomeController::class, 'userCommentEdit'])->name('user.post-comment.edit');
    Route::patch('user-post/comment/udpate/{id}', [HomeController::class, 'userCommentUpdate'])->name('user.post-comment.update');

    // Job Apply
    Route::get('/job', "HomeController@jobindex")->name('user.job.index');
    Route::get('/job/show/{id}', "HomeController@jobShow")->name('user.job.show');

    // Job Apply
    Route::get('/jobsave', "HomeController@jobsaveindex")->name('user.jobsave.index');
    Route::delete('/jobsave/{id}/destroy', [HomeController::class, 'destroy'])->name('jobsave.destroy');

});
