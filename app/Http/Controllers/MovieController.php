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

        //get records from api
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

        #$var->intersect(Model::whereIn('id', [1, 2, 3])->get());

        //make array of $moviesAPI['id']'s 
        // call firstOrCreate function
        // add on intersect and add moviesAPI['id'] array as second argument of whereIn
    

        //combine API en DB array for view
        // TODO 
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        # TODO
        #
        # refactor route and controller function to use movie slug, not movie id
        # route /movies/{movie:slug} should give movie slug in URI
        # imdb movie - database movie todo needs to be implemented first

        
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


        //request movie from api and database
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
        //
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
