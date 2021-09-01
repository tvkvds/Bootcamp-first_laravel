@extends('layouts.app')

@section('content')

 

<div class="container justify-content-center">
    <div class="row justify-content-center">
        
            @foreach ($movies as $movie )
            
                <div class="card col-md-2 m-3">
               
                    <a href="/movies/"><img src="{{$movie[0]['image']}}" class="card-img-top mt-3" alt="..."></a>
                    <div class="card-body">
                        <a href="/movies/{{$movie[1]->slug}}">
                        <h5 class="card-title">{{$movie[0]['title']}}</h5>
                        </a>
                        @if ($movie[1]->rating == 0)
                            <p class="m-2"> This movie has no ratings yet! </p>
                        @else
                            <p class="m-2"> Rating {{$movie[1]->rating}}/5 </p>
                        @endif
                        
                        <div class="row">
                        <a href="#" title="add to watchlist" class=" col-md-3 m-1"><img width="15" src="{{ asset('/images/'.'plus.png') }}"></a>
                        <a href="#" title="watched" class=" col-md-3 m-1"><img width="15" src="{{ asset('/images/'.'eye.png') }}"></a>
                        <a href="#" title="rate" class=" col-md-3 m-1"><img width="15" src="{{ asset('/images/'.'star.png') }}"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        
    </div>
</div>

@endsection


