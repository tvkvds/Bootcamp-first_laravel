@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-7 border p-5 mx-3">

            <div class="row justify-content-center">

                <div class="col ">
                    <img width="250" src="{{$movieAPI['poster']}}">
                </div>

                <div class="col ">
                    <h1> {{$movieAPI['title']}} </h1>
                    <br>
                    <div class="row">

                        <div class="col ml-5">
                            <p> Duration </p>
                            <p> Released in </p>
                            <p> Rating </p>
                            <p> Watched by </p>
                            <p> On watchlists </p>
                        </div>
                    
                        <div class="col">
                            <p> {{$movieAPI['length']}}</p>
                            <p> {{$movieAPI['year']}}</p>
                            <p> {{$movieDB['rating']}}/5</p>
                            <p> {{$movieDB['watched_by']}} people</p> 
                            <p> {{$movieDB['watchlists']}}</p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row mt-5 justify-content-center">
            

            <!-- maybe dit stukje in controller implementeren ipv hier -->
            <?php 
            $formUrl = "/movies/store";
            $formMethod = "POST";
            ;?>
            
             
            @foreach ( $user['movies'] as $movie )
                @if ($movieDB['movie_id'] == $movie['movie_id'])
                 
                   <?php 
                   $formUrl = "/movies/" . $movie['id'];
                   $formMethod = "PUT";
                   ;?>

                @endif
            @endforeach

           
            

            <form  method="post" action="{{$formUrl}}">
            @csrf
            {{ method_field($formMethod) }}
                
                <input type="hidden" name="movie_id" class="form-control" value="{{$movieDB['id']}}" >
                <input type="hidden" name="watchlist" class="form-control" value="1" >
                <input type="hidden" name="action" class="form-control" value="watchlist" >
                
                
                <button type="submit" class="btn">Add to my watchlist <img class="mx-2" width="15" src="{{ asset('/images/'.'plus.png') }}"></button>
            </form>   

            <form  method="post" action="{{$formUrl}}">
            @csrf
            {{ method_field($formMethod) }}
                
                <input type="hidden" name="movie_id" class="form-control" value="{{$movieDB['id']}}" >
                <input type="hidden" name="watched" class="form-control" value="1" >
                <input type="hidden" name="action" class="form-control" value="watched" >
                
                
                <button type="submit" class="btn">Add to my watched movies <img class="mx-2" width="15" src="{{ asset('/images/'.'eye.png') }}"></button>
            </form>  
                        
                       
                        <a href="#" title="rate" class=" mx-1">Add rating <img class="mx-1" width="15" src="{{ asset('/images/'.'star.png') }}"></a>
            </div>

            <div class="row mt-3 justify-content-center">
                <?php
                $vidlink = substr($movieAPI['trailer']['link'], 27, 27);
                ?>
                <iframe 
                    src="https://www.imdb.com/video/imdb/{{$vidlink}}/imdb/embed?autoplay=false&width=480" autoplay="false" width="480" height="400" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" frameborder="no" scrolling="no" class=" border mt-5">
                </iframe>
            </div>

            
            

        </div>

            

        

        <div class="col-3 border p-5 mx-3">
            <h1>Hier komt de user info</h1>
            {{$user}}
            <br>
            <hr>
            <br>
            <h1>And maybe reviews?</h1>

        </div>

        


    </div>
    
</div>

@endsection