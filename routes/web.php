<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use hmerritt\Imdb;

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

    //set up connection to Unsplash API
    Unsplash\HttpClient::init([
        'applicationId'	=> env('UNSPLASH_KEY'),
        'utmSource' => env('UNSPLASH_APP')
    ]);

    //request image 
    $image = Cache::remember('image', 60*60*24, function ($id = 'wKTF65TcReY') {
        return Unsplash\Photo::find($id);
    });

    return view('/home', ['image' => ['img' => $image->urls['small'], 'user' => $image->user['name'], 'portfolio' => $image->user['portfolio_url']]]);

});

/*

Route::get('/findmovie', function () {
    return view('/movie/findmovie');
});

Route::post('/movies', function () {

    var_dump($_POST);
    $imdb = new Imdb;
    $movies = $imdb->search($_POST['findmovie']);
    

    return view('/movie/movies', ['movies' => $movies]);
});



Route::get('/movie', function () {
    
    $imdb = new Imdb;
    $movies = $imdb->search("how to train");
    

    return view('/movie/movie', ['movies' => $movies]);
});

*/

Route::resource('/user', App\Http\Controllers\UserController::class);

Route::get('/posts', function () {

    return view('/posts', ['posts' => Post::allPosts()]);

});

Route::get('/posts/{post}', function ($slug) {

    return view('/post', ['post' => Post::find($slug)]);

});

Route::resource('movies', App\Http\Controllers\MovieController::class);

