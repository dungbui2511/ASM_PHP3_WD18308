<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostByCateController;
use App\Http\Controllers\PostDetailController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SignupController;
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
Route::get('/login',function(){
    return view('auth.login');
})->name('login');
Route::get('/signup',function(){
    return view('auth.signup');
});
Route::post('login',[LoginController::class,'save']);
Route::post('signup',[SignupController::class,'save']);
Route::get('admin',[AdminController::class,'index'])->middleware('auth')->name('admin');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('admin/posts',[AdminController::class,'posts'])->middleware('auth');
Route::get('admin/categories',[AdminController::class,'categories'])->middleware('auth');
Route::get('admin/tags',[AdminController::class,'tags'])->middleware('auth');
Route::get('admin/tags/{type}',[AdminController::class,'tags'])->middleware('auth');
Route::post('admin/tags/{type}',[AdminController::class,'tags'])->middleware('auth');
Route::get('admin/tags/{type}/{id}',[AdminController::class,'tags'])->middleware('auth');
Route::post('admin/tags/{type}/{id}',[AdminController::class,'tags'])->middleware('auth');
Route::get('admin/posts/{type}',[AdminController::class,'posts'])->middleware('auth');
Route::post('admin/posts/{type}',[AdminController::class,'posts'])->middleware('auth');
Route::get('admin/posts/{type}/{id}',[AdminController::class,'posts'])->middleware('auth');
Route::post('admin/posts/{type}/{id}',[AdminController::class,'posts'])->middleware('auth');
Route::get('admin/categories',[AdminController::class,'categories'])->middleware('auth');
Route::get('admin/categories/{type}',[AdminController::class,'categories'])->middleware('auth');
Route::post('admin/categories/{type}',[AdminController::class,'categories'])->middleware('auth');
Route::get('admin/categories/{type}/{id}',[AdminController::class,'categories'])->middleware('auth');
Route::post('admin/categories/{type}/{id}',[AdminController::class,'categories'])->middleware('auth');
Route::get('/forget-password',[ForgetPasswordManager::class,'forgetPassword'])->name('forget.password');
Route::post('/forget-password',[ForgetPasswordManager::class,'forgetPasswordPost'])->name('forget.password.post');
Route::get('reset-password/{token}',[ForgetPasswordManager::class,'resetPassword'])->name('reset.password');
Route::post('/reset-password',[ForgetPasswordManager::class,'resetPasswordPost'])->name('reset.password.post');



