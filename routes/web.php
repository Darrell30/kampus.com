<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


Route::post('/articles/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.perform');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
});

Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/articles/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/artikel/create', [ArticleController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [ArticleController::class, 'store'])->name('artikel.store');
}); 


use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\User\DashboardController as UserDashboard;

Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    // Artikel dan fitur lainnya khusus admin bisa ditambahkan di sini juga
});

Route::middleware(['auth', 'checkrole:user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboard::class, 'index'])->name('user.dashboard');
});

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
