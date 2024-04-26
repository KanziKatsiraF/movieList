@extends('navbaruser')
@section('body')
<div class="d-flex flex-column align-items-center mt-4">
    <p id="title" class="fs-1 fw-bold text-white">Register</p>
    {{-- Ke Controller --}}
    <form method="POST" action="regisAction" class="d-flex flex-column align-items-center text-white">
        @csrf
            <div class="mb-3 w-100">
                <label for="name" class="form-label">name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="name">
            </div>

            <div class="mb-3 w-100">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input name="phone" type="tel" class="form-control" id="phone" aria-describedby="phone">
            </div>

            <div class="mb-3 w-100">
                <label for="exampleInputEmail1" class="form-label">DoB</label>
                <input name="dob" type="date" class="form-control" id="dob" aria-describedby="dobHelp">
            </div>
            <div class="mb-3 w-100">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-100">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            @if ($errors->any())
            <span class='text-danger'>{{$errors->first()}}</span>
            @endif
            <button type="submit" class="btn btn-primary mt-4 text-white">Register</button>

            <a href="/login" class="btn btn-outline-dark mt-4 text-white">back</a>
    </form>
</div>
@endsection
@include('footer')
