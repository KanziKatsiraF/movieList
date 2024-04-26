@extends('navbaruser')
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-danger text-center">Update Profile</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <h3 class="text-white">My <span class="text-danger">Profile</span></h3>
                <img class="bg-white" style="max-width:50%;max-height:50%;border-radius:50%;" src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="">
                <p class="text-white">{{Auth::user()->name}}</p>
                <p class="text-secondary">{{Auth::user()->email}}</p>
            </div>
            <div class="col-md-8">
                <form action="{{url('profile')}}" method="post">
                    @csrf
                    <input class="form-control mt-4 bg-dark text-white" type="text" name="name" value="{{Auth::user()->name}}" placeholder="Username">
                    <input class="form-control mt-4 bg-dark text-white" type="email" name="email" value="{{Auth::user()->email}}" placeholder="Email">
                    <input class="form-control mt-4 bg-dark text-white" type="date" name="dob" value="{{Auth::user()->dob}}" placeholder="DOB">
                    <input class="form-control mt-4 bg-dark text-white" type="tel" name="phone" value="{{Auth::user()->phone}}" placeholder="Phone">
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn-block btn btn-danger">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

 @endsection
@include('footer')
