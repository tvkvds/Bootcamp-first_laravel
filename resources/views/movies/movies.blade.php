@extends('layouts.app')

@section('content')

 
<div class="container justify-content-center">
    <div class="row justify-content-center">
        
            @foreach ($movies['titles'] as $movie )
                <div class="card col-md-2 m-3">
               
                    <a href="/movies/{{$movie['id']}}"><img src="{{$movie['image']}}" class="card-img-top mt-3" alt="..."></a>
                    <div class="card-body">
                        <a href="/movies/{{$movie['id']}}">
                        <h5 class="card-title">{{$movie['title']}}</h5>
                        </a>
                        <p class="m-2"> Rating 5/7 </p>
                        <div class="row">
                        <a href="#" class=" col-md-3 m-1"><img width="15" src="{{ asset('/images/'.'plus.png') }}"></a>
                        <a href="#" class=" col-md-3 m-1"><img width="15" src="{{ asset('/images/'.'eye.png') }}"></a>
                        <a href="#" class=" col-md-3 m-1"><img width="15" src="{{ asset('/images/'.'star.png') }}"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        
    </div>
</div>

@endsection


