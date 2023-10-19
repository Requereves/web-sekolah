<?php

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

<<<<<<< HEAD

=======
>>>>>>> aeaa1901be2ed012d25892bfa1eb8031346f5d8d
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'ShowLoginForm']);
Auth::routes(['register' => false]);

Route::prefix('admin')->group(function () {
<<<<<<< HEAD

=======
>>>>>>> aeaa1901be2ed012d25892bfa1eb8031346f5d8d
    Route::group(['middleware' => 'auth'], function(){

        //dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

        //permissions
        Route::resource('/permission', App\Http\Controllers\Admin\PermissionController::class, ['except' => ['show', 'create', 'edit', 'update', 'delete'] ,'as' => 'admin']);

        //roles
        Route::resource('/role', App\Http\Controllers\Admin\RoleController::class, ['except' => ['show'] ,'as' => 'admin']);
<<<<<<< HEAD
    
=======

>>>>>>> aeaa1901be2ed012d25892bfa1eb8031346f5d8d
        //users
        Route::resource('/user', App\Http\Controllers\Admin\UserController::class, ['except' => ['show'] ,'as' => 'admin']);

        //tags
        Route::resource('/tag', App\Http\Controllers\Admin\TagController::class, ['except' => 'show' ,'as' => 'admin']);
<<<<<<< HEAD
        
        //categories
        Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class, ['except' => 'show' ,'as' => 'admin']);
    
        //posts
        Route::resource('/post', App\Http\Controllers\Admin\PostController::class, ['except' => 'show' ,'as' => 'admin']);
    
        //event
        Route::resource('/event', App\Http\Controllers\Admin\EventController::class, ['except' => 'show' ,'as' => 'admin']);
=======

        //categories
        Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class, ['except' => 'show' ,'as' => 'admin']);

        //posts
        Route::resource('/post', App\Http\Controllers\Admin\PostController::class, ['except' => 'show' ,'as' => 'admin']);

        //event
        Route::resource('/event', App\Http\Controllers\Admin\EventController::class, ['except' => 'show' ,'as' => 'admin']);

        //photo
        Route::resource('/photo', App\Http\Controllers\Admin\PhotoController::class, ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);

        //video
        Route::resource('/video', App\Http\Controllers\Admin\VideoController::class, ['except' => 'show' ,'as' => 'admin']);

        //slider
        Route::resource('/slider', App\Http\Controllers\Admin\SliderController::class, ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);
>>>>>>> aeaa1901be2ed012d25892bfa1eb8031346f5d8d

        //photo
        Route::resource('/photo', App\Http\Controllers\Admin\PhotoController::class, ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);
    
        //video
        Route::resource('/video', App\Http\Controllers\Admin\VideoController::class, ['except' => 'show' ,'as' => 'admin']);
    
        //slider
        Route::resource('/slider', App\Http\Controllers\Admin\SliderController::class, ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);
    });

<<<<<<< HEAD
=======


>>>>>>> aeaa1901be2ed012d25892bfa1eb8031346f5d8d
});