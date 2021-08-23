@extends('layouts.app')

@section('content')

<div class="container">

{{$post->title}}

<br>
<hr>
<br>
{!! $post->body !!}

</div>

@endsection