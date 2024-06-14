<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeConroller;
use App\Http\Controllers\SocialLoginController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/// required route files /////////
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', [HomeConroller::class,'index'])->name('front.index');
    Route::get('/news', [HomeConroller::class,'news'])->name('front.news');
    Route::get('/products', [HomeConroller::class,'products'])->name('front.products');
    Route::get('/products', [HomeConroller::class,'products'])->name('front.products');
    Route::get('/shops', [HomeConroller::class,'shops'])->name('front.shops');
    Route::get('/about', [HomeConroller::class,'about'])->name('front.about');
    Route::get('/category', [HomeConroller::class,'category'])->name('front.category');
    Route::get('/category/{slug}', [HomeConroller::class,'get_category_slug'])->name('front.category_slug');
    Route::get('/category/product/{slug}', [HomeConroller::class,'get_single_product_slug'])->name('front.single_product');
    Route::get('/contacts', [HomeConroller::class,'contacts'])->name('front.contacts');
    Route::get( '/order', [HomeConroller::class,'order'])->name('front.order');
    Route::get('/stripe/{price}' , [HomeConroller::class,'stripe'])->name('front.stripe');
    Route::post('/stripe/{price}' , [HomeConroller::class,'stripePost'])->name('stripe.post');
    Route::post('/comment' , [HomeConroller::class,'comment'])->name('comment');
    Route::get('/products/search' , [HomeConroller::class,'search'])->name('products.search');
    // Cart Route
    Route::post('/cart/{product}',[CartController::class,'store'])->name('cart.store');
    Route::get('/cart', [CartController::class,'show'])->name('cart.show');
    Route::delete('/cart/{id}', [CartController::class,'destroy'])->name('cart.destroy');

    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    // ############# social routes for login  ###########//
    // Route::get('socialite/{driver}',[SocialLoginController::class,'toProvider'])->where('driver','google|github');
    // // call back route
    // Route::get('auth/{driver}/login',[SocialLoginController::class,'handleCallback'])->where('driver','google|github');

    Route::get('/auth/github', [SocialLoginController::class, 'redirect'])->name('auth.github');

    Route::get('/auth/github/callback', [SocialLoginController::class, 'callback']);

// routes/web.php




/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
