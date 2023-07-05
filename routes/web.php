<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
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

//Route::get('/', [PostController::class, 'index']);
//Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('posts/{post:slug}', 'show');
});

//Route::get('categories/{category:slug}', function (Category $category) {
//    return View::make('posts', [
//        'posts' => $category->posts,
//        'currentCategory' => $category,
//        'categories' => Category::all()
//    ]);
//});

//Route::get('authors/{author:username}', function (User $author) {
//    return View::make('posts.index', [
//        'posts' => $author->posts,
//    ]);
//});

Route::get('/user/{tor}', function (string $test) {
    return 'User ' . $test;
});

Route::get('/posts/{post}/comments/{comment?}', function (string $postId, string $commentId = "bilat") {
    return "Post = {$postId} and Comment = {$commentId}";
});

Route::get('/user/{tor}/profile', function (string $test) {
    return route('profile', ['tor' => $test]);
})->name('profile');


Route::get('/ginger', function () {
    //    return redirect()->route('profile');
    //    return to_route('profile', ['tor' => "mermer"]);
    return Redirect::route('profile', ['tor' => 'mermer']);
});

Route::domain('google.com')->group(function () {
    Route::get('user/{id}', function (string $account, string $id) {
        return "Hello Ginger";
    });
});

Route::prefix('payment')->group(function () {
    Route::get('/', function (){
        return "Hello From /payment index";
    });

    Route::get('/user/{id}', function (string $id){
        return "Hello From /payment {$id}";
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', function () {
        return route('admin.users') . " From this routes";
    })->name('users');
});

