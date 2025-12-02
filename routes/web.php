<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\http\controllers\ProductController;

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


    Route::get('/index',[ProductController::class,'index'])->name('products.index');
    Route::get('/add-product',[ProductController::class,'AddProduct'])->name('products.add');
    Route::post('/add-product-form',[ProductController::class,'AddProductForm'])->name('products.addform');
    Route::post('/add-product-form',[ProductController::class,'AddProductForm'])->name('products.addform');
    Route::get('/edit-form/{id}',[ProductController::class,'EditForm'])->name('products.editform');
    Route::post('/edit',[ProductController::class,'update'])->name('products.edit');
    Route::get('/delete/{id}',[ProductController::class,'delete'])->name('products.delete');

});


require __DIR__.'/auth.php';
