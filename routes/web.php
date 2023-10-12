<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// frontend controller
Route::get('/',[FrontendController::class, 'index'])->name('index');
Route::get('/categories/blogs/{id}',[FrontendController::class, 'category_blogs'])->name('blogs.category');
Route::get('/single/blogs/{id}',[FrontendController::class, 'single_blogs'])->name('single.blogs');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ProfileController
Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
Route::post('/profile/name/update',[ProfileController::class,'name_update'])->name('profile.name.update');
Route::post('/profile/image/update',[ProfileController::class,'image_update'])->name('profile.image.update');
Route::post('/profile/password/update',[ProfileController::class,'password_update'])->name('profile.password.update');

// CategoryController
Route::get('/category',[CategoryController::class,'index'])->name('category');

// TagController
Route::get('/tag',[TagController::class,'index'])->name('tags');

// BlogController
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::post('/blog/status/change/{id}',[BlogController::class,'status_change'])->name('blog.status');
Route::get('/blog/edit/{id}',[BlogController::class,'blog_edit'])->name('blog.edit');
Route::post('/blog/edit/post/{id}',[BlogController::class,'edit_post'])->name('blog.edit.post');
Route::post('/blog/delete/{id}',[BlogController::class,'blog_delete'])->name('blog.delete');
Route::post('/blog/all/del',[BlogController::class,'blog_delete_all'])->name('blog.delete.all');
Route::get('/blog/insert',[BlogController::class,'insert_page'])->name('blog.insert');
Route::post('/blog/insert/post',[BlogController::class,'insert'])->name('blog.insert.post');

// RoleController
Route::get('/role/management',[RoleController::class,'index'])->name('role.management');
Route::post('/role/permission/store',[RoleController::class,'permission_store'])->name('role.permission.store');
Route::post('/role/store',[RoleController::class,'role_store'])->name('role.store');
Route::get('/role/delete/{id}',[RoleController::class,'role_delete'])->name('role.delete');
Route::post('/assign/user/role',[RoleController::class,'assign_role'])->name('assign.role');

