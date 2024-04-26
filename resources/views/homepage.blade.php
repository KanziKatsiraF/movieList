@extends('navbaruser')
@section('CSSAddition')
{{-- {
    .card-img-top
    width: 100%;
    height: 45vw;
    object-fit: cover;
} --}}
@endsection
@section('body')
<div>





<form class=" w-25  d-sm-flex " action="{{ url('/viewMovie/search') }}">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

@auth
@if (Auth::user()->role=='admin')
<div>
    <a class=" btn btn-outline-success text-left mt-2 " type="submit" href="/createMovie">Add Movie</a>
</div>

@endif
@endauth
@foreach ($moviess as  $moviess)
<div id="carouselExampleCaptions" class="d-flex flex-wrap carousel slide justify-content-center m-auto rounded" data-bs-ride="carousel" style="width: 70rem;" style="height: 10rem;">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner h-50 ">
      <div class="carousel-item active h-50">
        <img src="{{ url('storage/' .$moviess->background_url ) }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1>{{$moviess->title}} </h1>
          <h2>{{$moviess->description}}</h2>
        </div>
      </div>
      @foreach ($moviesss as  $moviesss)
      <div class="carousel-item">
        <img src="{{ url('storage/' .$moviesss->background_url ) }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1>{{$moviesss->title}} </h1>
            <h2>{{$moviesss->description}}</h2>
        </div>
      </div>
      @endforeach
      @foreach ($moviessss as  $moviessss)
      <div class="carousel-item">
        <img src="{{ url('storage/' .$moviessss->background_url ) }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1>{{$moviessss->title}} </h1>
            <h2>{{$moviessss->description}}</h2>
        </div>
      </div>
    </div>
@endforeach
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endforeach

<div class="d-flex bd-highlight flex-wrap  justify-content-center">
    @foreach ($movies as  $movies)
<div class="card m-4" style="width: 18rem;">
    <img class="card-img-top" src={{ url('storage/' .$movies->image_url ) }} alt="...">
        <div class="card-body">
        <h3 class="card-title">{{$movies->title}}</h3>
        <h5 class="card-tex t text">{{$movies->director}}</h5>

        <div class="d-flex">

            <div class="d-flex">

                <a href="/moviedetail/{{$movies->id}}"><button class="btn btn-primary">Detail</button></a>
            </div>

        </div>
        </div>
</div>
@endforeach
</div>
</div>
@endsection
