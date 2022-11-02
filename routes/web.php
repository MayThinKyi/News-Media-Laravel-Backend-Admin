<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminListController;
use App\Http\Controllers\TrendPostController;
use App\Http\Controllers\Api\ContactController;

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


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

  //Admin Profle
  Route::get('/dashboard',[ProfileController::class,'index'])->name('dashboard');
  Route::post('/adminUpdate',[ProfileController::class,'updateAccount'])->name('admin#update');
  Route::get('/admin/changePasswordPage',[ProfileController::class,'changePasswordPage'])->name('admin#changePasswordPage');
 Route::post('/admin/changePassword',[ProfileController::class,'changePassword'])->name('admin#updatePassword');
 //Admin List
Route::get('/admin/list',[AdminListController::class,'index'])->name('admin#list');
 Route::get('/admin/delete/{id}',[AdminListController::class,'deleteAdmin'])->name('admin#delete');
Route::post('/admin/search/',[AdminListController::class,'searchAdminList'])->name('admin#search');
//Category
Route::get('/category',[CategoryController::class,'index'])->name('admin#category');
Route::post('/category/create',[CategoryController::class,'createCategory'])->name('admin#createCategory');
Route::get('/category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin#deleteCategory');
Route::get('/category/searchCategory',[CategoryController::class,'searchCategory'])->name('admin#searchCategory');
Route::get('/category/editCategoryPage/{id}',[CategoryController::class,'editCategoryPage'])->name('admin#editCategoryPage');
Route::post('/category/update/{id}',[CategoryController::class,'updateCategory'])->name('admin#updateCategory');
//Posts
Route::get('/post',[PostController::class,'index'])->name('admin#post');
Route::post('/post/create',[PostController::class,'createPost'])->name('admin#createPost');
Route::get('/get/{id}',[PostController::class,'deletePost'])->name('admin#deletePost');
Route::get('/post/editPage/{id}',[PostController::class,'editPostPage'])->name('admin#editPostPage');
Route::post('/post/update/{id}',[PostController::class,'updatePost'])->name('admin#updatePost');
Route::get('/post/search',[PostController::class,'searchPost'])->name('admin#searchPost');
//Trend Post
Route::get('/trendPost',[TrendPostController::class,'index'])->name('admin#trendPost');
Route::get('/trendPost/details/{id}',[TrendPostController::class,'trendPostDetails'])->name('admin#trendPostDetails');
//Contact
Route::get('/contact',[ContactController::class,'contactPage'])->name('admin#contact');
});
