<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index'])->name('con');

// Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

/// For Brand Route
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// Multi Image Route
Route::get('/multi/image', [BrandController::class, 'Multpic'])->name('multi.image');

Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    $users = DB::table('users')->get();

    return view('dashboard', compact('users'));
})->name('dashboard');
