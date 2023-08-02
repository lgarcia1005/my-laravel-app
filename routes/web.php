<?php

use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
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

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('posts/{post:slug}', 'show')->name('show');

});

Route::name('admin.')->prefix('admin')->middleware('admin')->controller(AdminPostController::class)->group(function () {
    Route::get('posts', 'index')->name('post.home');
    Route::get('posts/create', 'create')->name('post.create');
    Route::get('posts/{post}/edit', 'edit');
    Route::patch('posts/{post}', 'update');
    Route::delete('posts/{post}', 'destroy');
    Route::post('posts', 'store');
});

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::controller(RegisterController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('register', 'create');
        Route::post('register', 'store');
    });
});

Route::post('logout', [SessionsController::class, 'destroy']);

Route::controller(SessionsController::class)->group(function () {
    Route::post('logout', 'destroy')->middleware('auth');
    Route::get('login', 'create')->middleware('guest');
    Route::post('login', 'store');
});

Route::post('newsletter', NewsletterController::class);

Route::resource('photos', App\Http\Controllers\Test\PhotoController::class)->withTrashed();

Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});

Route::post('data', function (Request $request) {
    var_dump($request->all());
});
