<?php
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Comment\CommentsController;
use App\Http\Controllers\Admin\Main\AdminMainController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\home\Category\CategoryPostsController;
use App\Http\Controllers\home\Comment\CommentMainController;
use App\Http\Controllers\home\HomePostsController;
use App\Http\Controllers\home\like\LikeHomeController;
use App\Http\Controllers\home\Tag\TagPostsController;
use App\Http\Controllers\Personal\Comment\CommentController;
use App\Http\Controllers\Personal\like\LikeController;
use App\Http\Controllers\Personal\PersonalController;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//home
Route::group(['namespace'=>'home'],function (){
    Route::get('/', [HomePostsController::class, 'index'])->name('main.index');
    Route::get('/{post}', [HomePostsController::class, 'show'])->name('main.show');

    Route::group(['namespace' => 'home/Comment', 'prefix'=>''],function (){
       Route::post('{post}/comment',[CommentMainController::class,'store']) ->name('comment.main.store');
        Route::delete('/{comment}/', [CommentMainController::class, 'destroy'])->name('comment.main.destroy');
    });

    Route::group(['namespace' => 'home/likes', 'prefix'=>'{post}/likes'],function (){
       Route::post('/',[LikeHomeController::class,'store']) ->name('likes.main.store');
    });
});

//home category
Route::group(['namespace'=>'home/category', 'prefix'=> 'categories'],function (){
    Route::get('/list',[CategoryPostsController::class,'index'])->name('main.category.index');

    Route::group(['namespace'=>'home/category', 'prefix'=> '{category}/post'],function (){
        Route::get('/',[CategoryPostsController::class, 'getPosts'])->name('main.category.posts');

    });
});
//home tag
Route::group(['namespace'=>'home/tag', 'prefix'=> 'tags'],function (){
    Route::get('/lists',[TagPostsController::class,'index'])->name('main.tag.index');

    Route::group(['namespace'=>'home/tag', 'prefix'=> '{tag}/post'],function (){
        Route::get('/',[TagPostsController::class, 'getPosts'])->name('main.tag.posts');

    });
});

//PERSONAL CABINET
Route::group(['namespace' => 'personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [PersonalController::class, 'home']) -> name('personal.home');
    Route::get('/home/{personal}/edit',[PersonalController::class, 'edit'])->name('personal.home.edit');
    Route::post('/home/{personal}/update',[PersonalController::class, 'update'])->name('personal.home.update');

    Route::group(['namespace' => 'comment', 'prefix' => 'comment'], function(){
        Route::get('/',[CommentController::class, 'index'])->name('personal.comment.index');
        Route::get('/{comment}/edit',[CommentController::class, 'edit'])->name('personal.comment.edit');
        Route::patch('/{comment}',[CommentController::class, 'update'])->name('personal.comment.update');
    });

    Route::group(['namespace' => 'like', 'prefix'=>'like'], function (){

        Route::get('/', [LikeController::class, 'index'])->name('personal.like.index');
    });
});
//ADMIN                                                                                       верефикация
Route::group(['namespace' => 'Main', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    //MAIN
    Route::group(['namespace' => 'admin/main', 'prefix'=>'main'], function () {
        Route::get('/', [AdminMainController::class, 'index'])->name('admin.main.index');
    });

    //POST
    Route::group(['namespace' => 'post', 'prefix' => 'posts'], function () {

        Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('admin.post.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::patch('/{post}', [PostController::class, 'update'])->name('admin.post.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('admin.post.destroy');
    });

    //CATEGORY
    Route::group(['namespace' => 'category', 'prefix' => 'categories'], function () {

        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });

    //tag
    Route::group(['namespace' => 'tag', 'prefix' => 'tags'], function () {

        Route::get('/', [TagController::class, 'index'])->name('admin.tag.index');
        Route::get('/create', [TagController::class, 'create'])->name('admin.tag.create');
        Route::post('/', [TagController::class, 'store'])->name('admin.tag.store');
        Route::get('/{tag}', [TagController::class, 'show'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
        Route::patch('/{tag}', [TagController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('admin.tag.destroy');
    });

    //user
    Route::group(['namespace' => 'users', 'prefix' => 'users'], function () {

        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });

    //comment
    Route::group(['namespace' => 'comment', 'prefix' => 'comment'],function(){

        Route::get('/', [CommentsController::class, 'index'])->name('admin.comment.index');
        Route::get('/{comment}/edit', [CommentsController::class, 'edit'])->name('admin.comment.edit');
        Route::patch('/{comment}', [CommentsController::class, 'update'])->name('admin.comment.update');
    });
});


