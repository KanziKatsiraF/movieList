@extends('navbaruser')
@section('body')

<div class="d-flex flex-wrap justify-content-center mt-3">
    <div class="card" style="width: 40rem;">
        <img src={{ url('storage/' .$movies->image_url) }} class="card-img-top" alt="...">
        <div class="card-header">
        </div>
            <div class="card-body">
                @if(Session::has('msg'))
                    <i>
                        <small>
                            <h5 class="text-danger">{{Session::get('msg')}}</h5>
                        </small>
                    </i>
                @endif
                <h3>Title:</h3>
                <h5 class="card-title">{{$movies->title}}</h5>
                <h3>Description:</h3>
                <p class="card-text text-success">{{$movies->description}}</p>
                <h3>Genre:</h3>
                <p class="card-text">{{$movies->genre}}</p>
                <h3>Director:</h3>
                <p class="card-text">{{$movies->director}}</p>
                <h3>Release Date:</h3>
                <p class="card-text">{{$movies->release_date}}</p>
                @auth
                @if (Auth::user()->role !='admin')
                <div class="d-flex">
                    <form action="{{ url('/addWatchlist') }}" method="POST">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{$movies->id}}">
                        <button type="submit" class="btn btn-xl btn-danger"> + Add To Watchlist</button>
                    </form>
                </div>
                @endif

                @endauth
            </div>
            @auth
          @if(Auth::user()->role =='admin')
          <div class="d-flex m-auto ">
            <form method="post" action="{{route('movies.movieDelete',['movie' => $movies->id])}}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-xl btn-dark btn-outline-danger">Delete</button>
            </form>
            <br>
            <a class="btn btn-xl btn-dark btn-outline-warning" href="/editmovie/{{$movies->id}}">Update</a>
          </div>
          @endif
          @endauth

    </div>
    </div>
    <br>

    <br>
    <br>


        <h1 class="text-white text-center">Actors: </h1>
        @foreach ($moviesActor as  $actor)
        <div class="card">
            <div class="card-body ">
                <h1 class="text-black text-center text-bold">{{$actor->Name}}</h1>
            </div>
          </div>

        @endforeach

    <h1 class="text-white text-center">MORE MOVIES </h1>
    <div class="d-flex bd-highlight flex-wrap  justify-content-center">

        @foreach ($moviess as  $moviess)
    <div class="card m-4" style="width: 18rem;">
        <img class="card-img-top" src={{ url('storage/' .$moviess->image_url ) }} alt="...">
            <div class="card-body">
            <h3 class="card-title">{{$moviess->title}}</h3>
            <h5 class="card-tex t text">{{$moviess->director}}</h5>

            <div class="d-flex">

                <div class="d-flex">

                    <a href="/moviedetail/{{$moviess->id}}"><button class="btn btn-primary">Detail</button></a>
                </div>

            </div>
            </div>
    </div>
    @endforeach
 @endsection
@include('footer')
