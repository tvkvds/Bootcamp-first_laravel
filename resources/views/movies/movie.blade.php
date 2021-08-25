@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        
           @foreach ($movies['titles'] as $movie )
            <div><a href="https://imdb-api.com/en/API/Title/{{env('IMDB_KEY')}}/{{$movie['id']}}/Trailer,Ratings,Wikipedia">
                <div>
                Title: {{$movie['title']}}
                <div>
                </div>
                <img src="{{$movie['image']}}" width='100'>
                <a>
               
           @endforeach
        </div>
    </div>
</div>
@endsection

