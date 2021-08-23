@extends('layouts.app')

@section('content')



<div class="container">

@foreach ($posts as $post) 

<a href="/posts/{{$post->slug}}">

    <h3>{{ $post->title; }}</h3>
    <h6>{{ $post->excerpt; }}</h6>
    <span>{{ $post->date}} </span>
    
</a>

<br>
<hr>

@endforeach 

</div>

@endsection