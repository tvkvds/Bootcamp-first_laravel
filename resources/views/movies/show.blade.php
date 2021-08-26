@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-6 border p-5 mx-5">

            <div class="row">

                <div class="col ">
                    <img width="250" src="{{$movie['poster']}}">
                </div>

                <div class="col ">
                    <h2> {{$movie['title']}} </h2>
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
                            <p><a href="{{$movie['trailer']['link']}}">watch<a></p>
                            <p> {{$movie['length']}} </p>
                            <p> {{$movie['year']}}</p>
                            <p> 5/7</p>
                            <p> 27</p>
                            <p> 99</p>
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

        </div>



    </div>

    <div class="row">

        
    

        
    </div>

        

    
    
</div>





@endsection