<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use hmerritt\Imdb;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Models\User_movie;
use App\Models\Movie;
use Str;

class MovieController extends Controller
{

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //get array of movie records from api
        $imdb = new Imdb;
        $moviesAPI = $imdb->search($_POST['findmovie']);


        //get or set records database
        $moviesDB = array_map(function ($movie) {
            return Movie::firstOrCreate(
                [ 'movie_id' => $movie['id'] ],
                [ 'slug' => Str::slug($movie['title']), 
                'title' => $movie['title'],
                'watched_by' => 0,
                'rating' => 0,
                'watchlists' => 0
                ]
            );
        }, $moviesAPI['titles']);

        // TODO N+1 problem fixing
        
        // TODO - ish
        // Maybe "cast" moviesDB attributes to array for ease of use / readability in view

        $movies = [];
        
        for ($i = 0; $i < count($moviesAPI['titles']); $i++){
            $movies[$i] = [$moviesAPI['titles'][$i], $moviesDB[$i]];  
        }
            
        return view('/movies/index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $movie_id = $_POST['movie_id'];
        $user_id = Auth::check() ? Auth::id() : false;

        if ($_POST['action'] === 'watchlist')
        {
            $movie = Movie::find($movie_id);

            $movie->update([ "watchlists" => +1 ]);

            $attributes = ['watchlist' => $_POST['watchlist'], 'created_at' => now()];
        }

        if ($_POST['action'] === 'watched')
        {
            $movie = Movie::find($movie_id);

            $movie->update([ "watched_by" => +1 ]);

            $attributes = ['watched' => $_POST['watched'], 'created_at' => now()];
        }
        
       
        
        $movie->user()->attach($user_id, $attributes);

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        //check for logged in user and set params
        $userId = Auth::check() ? Auth::id() : false;
        
        if ($userId === false)
        {
            $user = null;
        }
        else
        {
            $user = User::find($userId);
            $user->movies;
        }

        //request movie from api and (add to) database
        $imdb = new Imdb;
        $movieAPI = $imdb->film($id);

        $movieDB = Movie::firstOrCreate(
            [ 'movie_id' => $movieAPI['id'] ],
            [ 'slug' => Str::slug($movieAPI['title']), 
            'title' => $movieAPI['title'],
            'watched_by' => 0,
            'rating' => 0,
            'watchlists' => 0
            ]
        );

        //checks if current user has a record for current movie - bool
        $movieRecord = $user->movies->contains($movieDB['id']);
        var_dump($hasTask);

       

        return view('/movies/show', [
            'movieAPI' => $movieAPI,
            'user' => $user,
            'movieDB' => $movieDB
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie_id = $_POST['movie_id'];
        $user_id = Auth::check() ? Auth::id() : false;
        $movie = Movie::find($movie_id);
        

        if ($_POST['action'] === 'watchlist')
        {

            $movie->update([ "watchlists" => +1 ]);

            $attributes = ['watchlist' => $_POST['watchlist'], 'updated_at' => now()];
        }
        
        if ($_POST['action'] === 'watched')
        {
        
            $movie->update([ "watched_by" => +1 ]);

            $attributes = ['watched' => $_POST['watched'], 'updated_at' => now()];
        }
        
        $movie->user()->updateExistingPivot($user_id, $attributes);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
