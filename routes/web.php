<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Controllers\Client\ClientProductController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SendMailController;

// Route::get('/',function(){
//     return view('welcome');
// });


Route::get('admin/login',[AuthController::class,'login'])
        ->name('login');
Route::get('admin/loginn',[AuthController::class,'loginn'])
        ->name('loginn');        
Route::post('admin/checklogin',[AuthController::class,'checklogin'])
        ->name('checklogin'); 
Route::get('logout',[AuthController::class,'logout'])
        ->name('logout');

Route::group(['middleware'=>CheckLoginMiddleware::class],
function(){
    Route::get('/',[HomeController::class,'index']);
    Route::name('admin')->group(function(){
        Route::prefix('admin')->group(function(){
        Route::resources([
           'product'=>ProductController::class,
           'category'=>CategoryController::class,
            'order'=>AdminOrderController::class,
            'chart'=>ChartController::class 
        ]);
     });
     Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin.home');
     Route::get('/admin/show/{id}',[AdminHomeController::class,'show'])->name('admin.show');
     Route::post('/admin/sendmail/{id}',[SendMailController::class,'Thanhcong'])->name('admin.sendmail');
     Route::post('/admin/huyorder/{id}',[SendMailController::class,'ThatBai'])->name('admin.huyorder');
});
}
);

Route::name('client')->group(function(){
        Route::prefix('client')->group(function(){
        Route::resources([
                'home'=>ClientHomeController::class,
                'product'=>ClientProductController::class,
        ]);
        Route::prefix('cart')->group(function () {
                Route::get('view',[CartController::class,'view'])->name('cart.view');
            Route::get('add/{id}',[CartController::class,'add'])->name('cart.add');
            Route::get('remove/{id}',[CartController::class,'remove'])->name('cart.remove');
            Route::get('update/{id}',[CartController::class,'update'])->name('cart.update');
            Route::get('clear',[CartController::class,'clear'])->name('cart.clear');
        });
        Route::get('order',[OrderController::class,'submit_order'])->name('order');
     });
});


       