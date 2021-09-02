<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\User_movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Movie;

class User_movieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User_movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'movie_id' => Movie::factory(),
            'watched' => rand(0, 1),
            'watchlist' => rand(0, 1),
            'rated' => rand(0, 1),
            'rating' => rand(1, 5)
            
        ];
    }
}
