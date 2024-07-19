<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostByCateController;
use App\Http\Controllers\PostDetailController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('post-detail/{id}', [PostDetailController::class, 'show'])->name('post.show');
Route::get('post-by-cate/{cate_id}', [PostByCateController::class, 'show'])->name('post.by_cate');
Route::get('/search', [SearchController::class, 'searched'])->name('search');
