<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

        return cache()->rememberForever('posts.all', function (){
            
            //grab files
            $files =  File::files(resource_path('posts/'));

            //map over files and read metadata + body to make a new Post with
            return collect($files)
            ->map(function ($file){
                $document = YamlFrontMatter::parseFile($file);
            
                
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
                );

            })->sortByDesc('date');

        });
        

   
    }

    public static function find($slug)
    {
        
        $posts = Post::allPosts();

        if (! $posts->firstWhere('slug',$slug)) {
            throw new ModelNotFoundException();
        }

        return $posts;

    }
}
