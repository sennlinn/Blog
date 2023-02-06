<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|*/

/*authentication*/
Route::get('auth/login', [AuthController::class,'getLogin'])->name('login');
Route::post('auth/login',[AuthController::class,'postLogin'])->name('postLogin');
Route::get('auth/logout', [AuthController::class,'getLogout'])->name('logout');

/* registration*/
Route::get('auth/register', [AuthController::class,'getRegister'])->name('register');
Route::post('auth/register', [AuthController::class,'postRegister'])->name('postRegister');

/*password reset */
Route::get('password/reset/{token? }',function (){ return view('auth.password.email'); });
Route::post('password/email', [PasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [PasswordController::class, 'reset'])->name('reset');
/*categories*/
Route::resource('categories','App\Http\Controllers\CategoryController',['except'=>['create']]);
Route::post('categories',[CategoryController::class,'store']);
/*tags*/
Route::resource('tags','App\Http\Controllers\TagController',['except'=>['create']]);
Route::post('tags',[TagController::class,'store']);

/*slug searching*/
Route::get('blog/{slug}','App\Http\Controllers\BlogController@getSingle');
Route::get('blog', 'App\Http\Controllers\BlogController@getIndex')->name('blog');

/*pages*/
Route::get('contact', 'App\Http\Controllers\PagesController@getContact');
Route::post('contact',[PagesController::class,'postContact']);
Route::get('about','App\Http\Controllers\PagesController@getAbout' );
Route::get('/','App\Http\Controllers\PagesController@getIndex' );
/* posts*/
Route::resource('posts', 'App\Http\Controllers\PostController');
Route::post('posts/store', [PostController::class,'store'])->name('posts.store');

/*comments*/
Route::post('comments/{id}',[CommentController::class,'update'])->name('comments.update');
Route::post('comments/{post_id}',[CommentController::class,'store'])->name('comments.store');
Route::get('comments/{id}/edit',[CommentController::class,'edit'])->name('comments.edit');
Route::get('comments/{id}/delete',[CommentController::class,'delete'])->name('comments.delete');
Route::post('comments/{id}/destory',[CommentController::class,'destroy'])->name('comments.destroy');
