<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_movie extends Model
{
    use HasFactory;

    protected $table = "user_movies";

    public $user_id = 0; 
    public $movie_id = 0; 
    public $watched = 0; 
    public $rated = 0; 
    public $rating = 0;    


    

}
