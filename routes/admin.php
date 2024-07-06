<?php
namespace Route\Admin;
 use App\Http\Controllers\Admin\AdminController;
 use App\Http\Controllers\Admin\CategoryController;
 use App\Http\Controllers\Admin\ProductController;
 use Illuminate\Support\Facades\Route;
 use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


        Route::group([
            'prefix'=> LaravelLocalization::setLocale().'/admin',
            'middleware'=> ['auth','admin','localeSessionRedirect', 'localize']],function(){

        Route::get('/dashboard', [AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/orders', [AdminController::class,'orders'])->name('admin.orders');
        Route::get( '/order/update/{id}', [AdminController::class,'delivery'])->name('order.delivered');
        Route::get( '/order/print/{id}', [AdminController::class,'print'])->name('order.print');
        Route::get( '/send/email/{id}', [AdminController::class,'sendEmail'])->name('send_email');
        Route::post( '/send/email/{id}', [AdminController::class,'sendUserEmail'])->name('send_user_email');
        Route::get('/search', [AdminController::class,'search'])->name('search');



        Route::resources([
            'categories' => CategoryController::class,
            'products'   => ProductController::class,
        ]);


    });
