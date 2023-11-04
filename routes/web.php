<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('auth.login');


Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
;

Route::middleware(['auth'])->group(function () {
    
    Route::prefix('admin')->group(function () {

        Route::prefix('/post')->group(function () { 
    
            Route::get('/create', [PostController::class, 'create'])->name('post.create');
            Route::post('/store', [PostController::class, 'store'])->name('post.store');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    
            Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
            Route::get('/list', [PostController::class, 'list'])->name('list');
    
        });
    
    });

});




