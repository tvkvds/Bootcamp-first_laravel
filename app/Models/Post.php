<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    public $title = '';
    public $excerpt = '';
    public $date = '';
    public $body = '';
    public $slug = '';

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function allPosts()
    {
        $files =  File::files(resource_path('posts/'));

       return array_map(function ($file){
            return $file->getContents();
        }, $files);
    }

    public static function find($slug)
    {
        
         //declare file location
        $path = resource_path('posts/' . $slug . '.blade.php');
   
        //check if file exists
        if (! file_exists($path))
        {
            throw new ModelNotFoundException();
        }

        //cache file
        $post = cache()->remember('posts/' . $slug . '.blade.php', 5, function () use ($path)
        {

            return file_get_contents($path);

        });
        
        return $post;
    }
}
