@extends('navbaruser')
@section('body')

<div class="d-flex flex-wrap justify-content-center mt-3">
    <div class="card mt-2" style="width: 40rem;">
        <img src={{ url('storage/' .$actors->image_url) }} class="card-img-top mt-3" alt="...">
        <div class="card-header">
        </div>
            <div class="card-body">
            <h3>Name:</h3>
            <h5 class="card-title">{{$actors->Name}}</h5>
            <br>
            <h3>Biography:</h3>
            <p class="card-text text-success">{{$actors->Biography}}</p>
            <h3>Gender:</h3>
            <p class="card-text">{{$actors->Gender}}</p>
            <h3>Place Of Birth:</h3>
            <p class="card-text">{{$actors->PlaceOfBirth}}</p>
            <h3>Popularity:</h3>
            <p class="card-text">{{$actors->popularity}}</p>
            <div class="d-flex">

            </div>
            </div>
            @auth
            @if(Auth::user()->role =='admin')
            <div class="d-flex m-auto ">
                <form method="post" action="{{route('actors.actorDelete',['actor' => $actors->id])}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-xl btn-dark btn-outline-danger">Delete</button>
                </form>
                <br>

              <a class="btn btn-xl btn-dark btn-outline-warning" href='/editActor/{{$actors->id}}'>Update</a>
            </div>
            @endif
            @endauth


    </div>

    </div>
 @endsection
@include('footer')
