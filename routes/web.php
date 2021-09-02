<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Movie;


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

Route::resource('/user', App\Http\Controllers\UserController::class);



Route::post('/movies', [App\Http\Controllers\MovieController::class, 'index']);

Route::get('/movies/{movie:slug}',  [App\Http\Controllers\MovieController::class, 'show']);

Route::post('/movies/store',  [App\Http\Controllers\MovieController::class, 'store'])->middleware('auth');
Route::put('/movies/{id}',  [App\Http\Controllers\MovieController::class, 'update'])->middleware('auth');





