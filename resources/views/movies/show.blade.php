@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-6 border p-5 mx-5">

            <div class="row">

                <div class="col ">
                    <img width="250" src="{{$movieAPI['poster']}}">
                </div>

                <div class="col ">
                    <h2> {{$movieAPI['title']}} </h2>
                    <br>
                    <div class="row">

                        <div class="col">
                            <p> Trailer </p>
                            <p> Duration </p>
                            <p> Runtime </p>
                            <p> Rating </p>
                            <p> Watched </p>
                            <p> On watchlists </p>
                        </div>
                    
                        <div class="col">
                            <p><a href="{{$movieAPI['trailer']['link']}}">watch<a></p>
                            <p> {{$movieAPI['length']}} </p>
                            <p> {{$movieAPI['year']}}</p>
                            <p> {{$movieDB['rating']}}</p>
                            <p> {{$movieDB['watched_by']}} </p>
                            <p> {{$movieDB['watchlists']}}</p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row mt-5 border">

            interaction links/buttons

            </div>
        
        
        
    
        </div>
        <div class="col-4 border p-5">

        {{$user}}

        <h2> {{$movieAPI['title']}} </h2>
                    <br>
                    <div class="row">

                        <div class="col">
                            <p>  </p>
                            <p>  </p>
                            <p>  </p>
                            <p>  </p>
                            <p>  </p>
                            <p>  </p>
                        </div>
                    
                        <div class="col">
                            <p> </p>
                            <p> </p>
                            <p> </p>
                            <p> </p>
                            <p> </p>
                            <p> </p>
                        </div>

                    </div>

        </div>



    </div>

    <div class="row">
        
        {{$movieAPI['trailer']['link']}}
        <iframe src="https://www.imdb.com/video/imdb/{{$movieAPI['id']}}/imdb/embed?autoplay=false&width=480" width="480" height="270" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" frameborder="no" scrolling="no"></iframe>
    

        
    </div>

        

    
    
</div>





@endsection