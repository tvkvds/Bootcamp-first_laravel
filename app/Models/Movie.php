<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('watched', 'rated', 'rating', 'id');
    }

    protected $fillable = [
        'movie_id',
        'title',
        'slug',
        'watched_by',
        'rating',
        'watchlists'
            
    ];
}
