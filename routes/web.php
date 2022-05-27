<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\Lyrics\CategoryController;
use App\Http\Controllers\Admin\Lyrics\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\MainController;
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


//===============================> front page

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/lyricCategory/{lyricCategory}',[HomeController::class,'lyricCategory'])->name('home.category');
Route::get('/work',[HomeController::class,'work'])->name('home.work');
Route::get('/gallery',[HomeController::class,'gallery'])->name('home.gallery');
Route::get('/blog',[HomeController::class,'blog'])->name('home.blog');
Route::get('/blog/show/{blog}',[HomeController::class,'blogShow'])->name('home.blog.show');



//========================>Login progress
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');

Route::post('/auth/check',[MainController::class, 'check'])->name('auth.check');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');


Route::prefix('admin')->namespace('Admin')->group(function () {

    //==============>Dashborad<=================//
    Route::get('/',[MainController::class,'dashboard'])->name('admin.home');

    //==============>Gallery<=================//
    Route::prefix('gallery')->namespace('gallery')->group(function(){

        Route::get('/', [GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::get('/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
        Route::post('/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::get('/status/{gallery}',[GalleryController::class,'status'])->name('admin.gallery.status');
        Route::get('/edit/{gallery}', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::put('/update/{gallery}', [GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::delete('/destroy/{gallery}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

    });

    //==============>slider<=================//
    Route::prefix('slider')->namespace('slider')->group(function(){

        Route::get('/', [SliderController::class, 'index'])->name('admin.slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('admin.slider.create');
        Route::post('/store', [SliderController::class, 'store'])->name('admin.slider.store');
        Route::get('/status/{slider}',[SliderController::class,'status'])->name('admin.slider.status');
        Route::get('/edit/{slider}', [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::put('/update/{slider}', [SliderController::class, 'update'])->name('admin.slider.update');
        Route::delete('/destroy/{slider}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');

    });
    //==============>Lyrics<=================//
    Route::prefix('lyrics')->namespace('lyrics')->group(function(){

        //category
        Route::prefix('category')->group(function(){
            Route::get('/', [CategoryController::class, 'index'])->name('admin.lyrics.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.lyrics.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.lyrics.category.store');
            Route::get('/status/{lyricCategory}',[CategoryController::class,'status'])->name('admin.lyrics.category.status');
            Route::get('/edit/{lyricCategory}', [CategoryController::class, 'edit'])->name('admin.lyrics.category.edit');
            Route::put('/update/{lyricCategory}', [CategoryController::class, 'update'])->name('admin.lyrics.category.update');
            Route::delete('/destroy/{lyricCategory}', [CategoryController::class, 'destroy'])->name('admin.lyrics.category.destroy');
        });

        //text  ya post ya lyric
        Route::prefix('post')->group(function(){
            Route::get('/', [PostController::class, 'index'])->name('admin.lyrics.post.index');
            Route::get('/create', [PostController::class, 'create'])->name('admin.lyrics.post.create');
            Route::post('/store', [PostController::class, 'store'])->name('admin.lyrics.post.store');
            Route::get('/status/{lyric}',[PostController::class,'status'])->name('admin.lyrics.post.status');
            Route::get('/edit/{lyric}', [PostController::class, 'edit'])->name('admin.lyrics.post.edit');
            Route::put('/update/{lyric}', [PostController::class, 'update'])->name('admin.lyrics.post.update');
            Route::delete('/destroy/{lyric}', [PostController::class, 'destroy'])->name('admin.lyrics.post.destroy');
        });
    });


    //==============>User<=================//
    Route::prefix('user')->namespace('user')->group(function(){

        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    });


    //==============>blog<=================//
    Route::prefix('blog')->namespace('blog')->group(function(){

        Route::get('/', [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/status/{blog}',[BlogController::class,'status'])->name('admin.blog.status');
        Route::get('/edit/{blog}', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::put('/update/{blog}', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::delete('/destroy/{blog}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');

    });
});

});
