
@extends('navbaruser')
@section('CSSAddition')


@endsection
@section('body')


<form class="w-25 d-sm-flex" action="{{ url('/viewActor/search') }}">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
@auth
@if (Auth::user()->role== 'admin')
<div>
    <a class="btn btn-outline-success mt-" type="submit" href="/createActor">Add Actor</a>
</div>
@endif
@endauth

<div class="d-flex flex-wrap justify-content-center">
    @foreach ($actors as  $actors)
<div class="card m-4" style="width:18rem;">

    <img class="card-img-top" src={{ url('storage/' .$actors->image_url )}}  alt="...">
    <div class="card-header">
    </div>
        <div class="card-body">
        <h5 class="card-title">{{$actors->Name}}</h5>
        <p class="card-text">by</p>
        <h5 class="card-text text-">{{$actors->Gender}}</h5>

        <div class="d-flex">

            <div class="d-flex">

                <a href="/actordetail/{{$actors->id}}"><button class="btn btn-primary">Detail</button></a>
            </div>

        </div>
        </div>
</div>
@endforeach
</div>

@endsection


