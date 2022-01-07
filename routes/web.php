<?php

use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index'])->name('con');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();

    return view('dashboard', compact('users'));
})->name('dashboard');
