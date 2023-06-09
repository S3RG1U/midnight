<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('show');
    Route::post('/posts/store', [PostController::class, 'store'])->name('store');
    Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('destroy');
    Route::get('/posts', [PostController::class, 'search'])->name('posts.search');
});
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

