<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

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

Auth::routes();

Route::get('/home', function () {
    
    return view('/home');

});

Route::resource('/user', App\Http\Controllers\UserController::class);

Route::get('/posts', function () {

    return view('/posts', ['posts' => Post::allPosts()]);

});

Route::get('/posts/{post}', function ($slug) {

    return view('/post', ['post' => Post::find($slug)]);

});

