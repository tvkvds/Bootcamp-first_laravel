@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           @foreach ($movies['titles'] as $movie )
            <div class=m-5><a href="https://imdb-api.com/en/API/Title/{{env('IMDB_KEY')}}/{{$movie['id']}}/Trailer,Ratings,Wikipedia">
                <div class="my-3">
                <h5>{{$movie['title']}}</h5>
                </div>
                
                <img src="{{$movie['image']}}" width='100'>
                <a>
            </div> 
           @endforeach
        </div>
    </div>
</div>
@endsection

