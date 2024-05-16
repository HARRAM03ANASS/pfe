<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostPageController;
use App\Http\Controllers\AdminDashboardController;

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


Route::middleware(["auth","role:admin"])->group(function(){
    Route::get('/dashboard',[AdminDashboardController::class,'users'])->name('dashboard');
    Route::get('/unpublished/{slug}',[AdminDashboardController::class,'unpublish'])->name('unpublished');
    Route::get('/published/{slug}',[AdminDashboardController::class,'publish'])->name('published');
    Route::get('/unbanned/{id}',[AdminDashboardController::class,'unban'])->name('unbanned');   
    Route::get('/banned/{id}',[AdminDashboardController::class,'ban'])->name('banned');
    Route::get('/postspdf',[AdminDashboardController::class,'postsPdf'])->name('postsPdf');
    Route::get('/userspdf',[AdminDashboardController::class,'usersPdf'])->name('usersPdf');

});

Route::get('/',[HomeController::class,'display'])->name('home');
Route::get('/home',[HomeController::class,'display'])->name('home');
Route::get('Search',[searchController::class,'search'])->name('searchPage');
Route::get('post/{slug}',[PostPageController::class,'showPost'])->name('postPage');
Route::get('post/category/{id}',[CategoryController::class,'category'])->name('categoryPage');
Route::post('/email/sendmail',[EmailController::class,'sendemail'])->name('sendemail');
Route::get('/email/contact',[EmailController::class,'emailcontact'])->name('emailcontact');





Route::middleware(['auth','ban:0'])->group(function(){
    Route::get('posts/form',function(){return view('addPosts');})->name('addPosts');
    Route::get('profile',[ProfileController::class,'display'])->name('profile');
    Route::post('posts/store',[PostController::class,'add'])->name('storePosts');
    Route::get('post/delete/{slug}',[ProfileController::class,'delete'])->name('deletePost');
    Route::get('post/edit/{slug}',[ProfileController::class,'edit'])->name('editPost');
    Route::post('post/update/{slug}',[ProfileController::class,'update'])->name('updatePost');
    Route::post('comments',[CommentController::class,'store'])->name('comment');
    Route::get('comment/delete',[CommentController::class,'delete'])->name('comment.delete');
});

