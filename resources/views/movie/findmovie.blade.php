@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form  method="post" action="/movies">
            @csrf
                <div  class="form-group">
                    <label for="findmovie">Search for movie</label>
                    <input type="text" name="findmovie" class="form-control" value="yeet" id="findmovie" placeholder="example, the movie">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>   
        </div>
    </div>
</div>
@endsection
