@extends('navbaruser')
@section('body')

<div class="d-flex flex-column align-items-center mt-4 text-white">
    <p id="title" class="fs-1 fw-bold">Login</p>
    {{-- Ke Controller --}}
    <form method="POST" action="loginAction" class="d-flex flex-column align-items-center">
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input value='{{Cookie::get('mycookie') != null ? Cookie::get('mycookie') : ''}}' name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="form-check">
                {{-- SET VALUE FROM COOKIE --}}
                <input {{Cookie::get('mycookie') != null ? 'checked' : '' }} name="remember_me" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                </label>
            </div>
            @if ($errors->any())
            <span class='text-danger'>{{ $errors->first() }}</span>
        @endif
            <button type="submit" class="btn btn-primary mt-4 text-white">Login</button>
            <p class="fs-6 fw-light mt-4">not have account?</p>
            <a href="/regis" class="btn btn-outline-dark mt-2 text-white">Register</a>
    </form>
</div>
@endsection
@include('footer')
