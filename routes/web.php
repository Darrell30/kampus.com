<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::post('/articles/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.perform');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
});

Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/articles/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/login', function() {
    return 'Login page - belum dibuat';
})->name('login');

Route::get('/register', function() {
    return 'Register page - belum dibuat';  
})->name('register');

Route::post('/logout', function() {
    return 'Logout - belum dibuat';
})->name('logout');
