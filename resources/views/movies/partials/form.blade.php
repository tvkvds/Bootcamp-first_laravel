
<div class="container d-flex justify-content-center">
    <div class="row ">
        <div class="col-md-8">
        form
            <form  method="post" action="/movies/index">
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

