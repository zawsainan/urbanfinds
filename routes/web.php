<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified','rolemanager:user'])->name('home');


Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified','rolemanager:admin'])->name('admin');

Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get("/profile",function(){
            return view('admin.profile');
        });

        Route::controller(ProductController::class)->group(function(){
            Route::prefix('product')->group(function(){
                Route::get('/','index');

                Route::get('/delete/{id}','delete');

                Route::get("/add",'add');
                Route::post("/add",'create');

                Route::get("/edit/{id}",'edit');
                Route::post("/edit/{id}",'update');
                Route::get("/search",'search');
                Route::get("/sort",'sort');

            });
        });

        Route::controller(CategoryController::class)->group(function(){
            Route::prefix('category')->group(function(){
                Route::get('/','index');
                Route::get('/search','search');
                Route::get("/delete/{id}",'delete');
                Route::get("/add",'add');
                Route::post("/add",'create');
            });
        });

        Route::controller(OrderController::class)->group(function(){
            Route::prefix('order')->group(function(){
                Route::get("/",'index');
                Route::get("/detail/{id}",'detail');
                Route::get("/confirm/{id}","confirm");
                Route::get("/refund/{id}","refund");
            });
        });

        Route::controller(UserController::class)->group(function(){
            Route::prefix('user')->group(function(){
                Route::get("/","index");
                Route::get("/edit/{id}","edit");
                Route::get("/ban/{id}","ban");
                Route::get("/delete/{id}","delete");
            });
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get("/checkout",[OrderController::class,'checkout']);
Route::post("/checkout",[OrderController::class,'process']);

Route::prefix('products')->group(function(){
    Route::controller(ProductController::class)->group(function(){
        Route::get("/","index");
        Route::get("/sort","sort");
        Route::get("/detail/{id}","detail");
        Route::get("/promotion","promotion");
        Route::get("/search","search");
    });
});

Route::prefix("cart")->group(function(){
    Route::controller(CartController::class)->group(function(){
        Route::get("/",'view');
        Route::get("/add/{id}",'add');
        Route::get("/remove/{id}",'remove');
        Route::get("/clear",'clear');
        Route::post("/update/{id}",'update');
    });
});