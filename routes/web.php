<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\siteUIController;
use App\Http\Controllers\HomeController;







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


Auth::routes(['register'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');







Route::group([ 'middleware'=>'auth'], function () {   

//route for posts
Route::get('/posts',[PostsController::class,'index'])->name('posts');
Route::get('/post/trashed',[PostsController::class,'trashed'])->name('post.trashed');
Route::get('/post/restore/{id}',[PostsController::class,'restore'])->name('post.restore');
Route::get('/post/hdelete/{id}',[PostsController::class,'hdelete'])->name('post.hdelete');

Route::get('/post/create',[PostsController::class,'create'])->name('post.create');
Route::post('/post/store',[PostsController::class,'store'])->name('post.store');
Route::get('/post/edit/{id}',[PostsController::class,'edit'])->name('post.edit');
Route::get('/post/delete/{id}',[PostsController::class,'destroy'])->name('post.delete');
Route::post('/post/update/{id}',[PostsController::class,'update'])->name('post.update');

//route for Categories
Route::get('/categories', [CategoriesController::class,'index'])->name('categories'); 
Route::get('/category/create',[CategoriesController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoriesController::class,'store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoriesController::class,'edit'])->name('category.edit');
Route::get('/category/delete/{id}',[CategoriesController::class,'destroy'])->name('category.delete');
Route::post('/category/update/{id}',[CategoriesController::class,'update'])->name('category.update');


//route for tag
Route::get('/tags', [TagController::class,'index'])->name('tags');
Route::get('/tag/create',[TagController::class,'create'])->name('tag.create');
Route::post('/tag/store',[TagController::class,'store'])->name('tag.store');
Route::get('/tag/edit/{id}',[TagController::class,'edit'])->name('tag.edit');
Route::get('/tag/delete/{id}',[TagController::class,'destroy'])->name('tag.delete');
Route::post('/tag/update/{id}',[TagController::class,'update'])->name('tag.update');



//route for users
Route::get('/users', [UsersController::class,'index'])->name('users'); 
Route::get('/users/admin/{id}', [UsersController::class,'admin'])->name('users.admin'); //->middleware('admin'); 
Route::get('/users/notadmin/{id}', [UsersController::class,'notAdmin'])->name('users.not.admin'); 
Route::get('/users/create', [UsersController::class,'create'])->name('users.create'); 
Route::post('/users/store', [UsersController::class,'store'])->name('users.store'); 
Route::get('/users/delete/{id}', [UsersController::class,'destroy'])->name('users.delete'); 


//route for user profile
Route::get('/users/profile', [ProfilesController::class,'index'])->name('users.profile');
Route::post('/users/profile/update', [ProfilesController::class,'update'])->name('users.profile.update');
Route::get('/users/profile/create', [ProfilesController::class,'create'])->name('users.profile.create'); 



//route for settings 
Route::get('/settings', [settingsController::class,'index'])->name('settings');
Route::post('/settings/update', [settingsController::class,'update'])->name('settings.update');


//route for admin dashboard
Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard'); 





}) ;

//search
Route::get('/results', function () {
    $post = App\Models\Post::where('title', 'like' ,  '%' . request('search') . '%' )->get();
    return view('results.results')
    ->with('posts' , $post ) 
    ->with('title' ,  'Result : '. request('search') )
    ->with('settings',  App\Models\Setting::first() )
    ->with('blog_name' , App\Models\Setting::first()->blog_name)
    ->with('categories' , App\Models\Category::take(5)->get() )   
    ->with('query' , request('search') )   ;
    }) ;

//route for User front end
Route::get('/', [siteUIController::class,'index'])->name('index');
Route::get('/category/{id}', [siteUIController::class,'category'])->name('category.show');
Route::get('/tag/{id}', [siteUIController::class,'tag'])->name('tag.show');

//route for showing single post
Route::get('/post/{slug}', [siteUIController::class,'showPost'])->name('post.show'); 

//route for User front end
Route::get('/', [siteUIController::class,'index'])->name('index');
Route::get('/category/{id}', [siteUIController::class,'category'])->name('category.show');
Route::get('/tag/{id}', [siteUIController::class,'tag'])->name('tag.show');

//route for showing single post
Route::get('/post/{slug}', [siteUIController::class,'showPost'])->name('post.show'); 

