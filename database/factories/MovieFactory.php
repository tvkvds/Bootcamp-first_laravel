<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
                'watchlists' => rand(0,1234),
                'watched' => rand(0,1234),
                'movie_id' => Str::lower(Str::random(9)),
           
        ];
    }
}
