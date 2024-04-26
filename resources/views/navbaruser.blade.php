<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.css">
    @yield('CSSAddition')
    <style>
        body {
            background: black !important;

         }
     </style>
</head>
<body class=""  >
    <nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="/">MovieList</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link btn btn-dark text-white text-right" href="/">Home</a>
                <a class="nav-link btn btn-dark text-white text-right " href="/">Movies</a>
                <a class="nav-link btn btn-dark text-white text-right" href="/actorPage">Actors</a>
              </div>
          </div>
          @auth
          @if(Auth::user()->role !='admin')
          <a class="nav-link btn btn-dark text-white text-right" href="/addWatchlist">My WatchList</a>
          @endif
          @endauth

          @auth
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" width="40" height="40" class="rounded-circle">
              </a>
              <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{url('profile')}}">Profile</a>
                <hr>
                <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
              </div>
            </li>
          </ul>
              @endauth
              @guest
                <a class="btn btn-outline-primary mx-3" type="submit" href="/register">Register</a>
                <a class="btn btn-outline-success" type="submit" href="/login">Login</a>
              @endguest
        </div>
    </nav>
    <div>
        @yield('body')
    </div>

    {{-- <!-- Footer -->
    <footer class="  d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto mt-auto bg-dark text-center text-white expand">
    <!-- Grid container -->
    <div class="">
        <h1>MovieList</h1>
        <br>
        <section class="">
          <!-- Facebook -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook"></i

          ></a>

          <!-- Twitter -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
          ></a>

          <!-- Google -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-google"></i
          ></a>

          <!-- Instagram -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
          ></a>

          <!-- Linkedin -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
          ></a>

          <!-- Github -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-github"></i
          ></a>
              <br>
        <!-- Section: Form -->

        <!-- Section: Text -->
        <section class="mb-3">
          <p>
              <br>
      Movie list is a website that containts list of movie
          </p>

      <div class="text-center p-3" >
        Copyright © 2022 MovieList All Right Reserved

      </div>
      <!-- Copyright -->
            </footer>

        </footer> --}}

        <footer class="full-width ">


        <div id=" page-content w-100 ">
            <div class="margin-top-xl container bg-dark text-center text-white mt-3 p-xl-2 ">

              <div class="margin-top-xl row justify-content-center align-items-center">

                <div class="col-md-7 w-100  ">
                  <h1 class="margin-top-xl fw-light mt-4">MovieList</h1>
                  <p class="lead   "> Movie list is a website that containts list of movie</p>
                </div>

                <div class="text-center p-3 text-white" >
                    Copyright © 2022 MovieList All Right Reserved
                  </div>
              </div>
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-facebook"></i
              ></a>

          <!-- Twitter -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-twitter"></i
        ></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-google"></i
        ></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-instagram"></i
        ></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-github"></i
        ></a>
            </div>
          </div>
          <footer id=" padding-right-xl" class=" bg-dark padding-right-xl ">

          </footer>
        </footer>
</body>
</html>
