<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);
Route::get('/about', [AboutController::class]);
Route::get('/contact', [ContactController::class]);

Route::get('/job', [JobController::class, 'index']);

Route::middleware('auth')->group(function () {

    // Admin ONLY
    Route::middleware('role:admin')->group(function () {
        Route::delete('/blog/{id}', [PostController::class, 'destroy']);
    });


    // Editor and Admin routes
    Route::middleware('role:editor,admin')->group(function () {
        Route::get('/blog/create', [PostController::class, 'create']);
        Route::post('/blog', [PostController::class, 'store']);
        Route::middleware('can:update,post')->group(function () {
            Route::get('/blog/{post}/edit', [PostController::class, 'edit']);
            Route::put('/blog/{post}', [PostController::class, 'update']);
        });
    });


    // Viewer, Editor, and Admin routes
    Route::middleware('role:viewer,editor,admin')->group(function () {
        Route::get('/blog', [PostController::class, 'index']);
        Route::get('/blog/{post}', [PostController::class, 'show']);
        Route::resource('comments', CommentController::class);
    });
});


Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
