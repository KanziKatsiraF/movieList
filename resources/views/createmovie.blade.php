
@extends('navbaruser')
@section('body')
<div class="d-flex flex-column align-items-center mt-4">
    <p id="title" class="fs-1 fw-bold text-white">CreateMovie</p>
    <form enctype="multipart/form-data"  method="POST"  action='/insertDataMovie' class="d-flex flex-column align-items-center text-white bg-dark">
            {{-- CSRF --}}
            @csrf
            <div class="mb-3 w-100">
                <label for="InputTitle" class="form-label">Title</label>
                <input name="inputTitle" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 w-100">
                <label for="inputDescription" class="form-label">Description</label>
                <textarea name="inputDescription" type="textarea" class="form-control" id="exampleInputPassword1"></textarea>
            </div>
            <div class="mb-3 w-100">
                <label for="inputGenre" class="form-label">Genre</label>
                <select name="inputGenre" class="form-select mt-2" aria-label="Default select example">
                    <option value="Documentary">Documentary</option>
                    @foreach ($movies as $movies)
                    <option value='{{$movies->genre}}'> {{$movies->genre}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3 w-100">
                <label for="inputActor" class="form-label">Actor</label>
                <select name="inputActor" class="form-select mt-2" aria-label="Default select example">
                    @foreach ($moviesActor as $actors)
                    <option value='{{$actors->id}}'> {{$actors->Name}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3 w-100">
                <label for="InputDirector" class="form-label">Director</label>
                <input name="inputDirector" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-100">
                <label for="InputReleaseDate" class="form-label">ReleaseDate</label>
                <input name="inputReleaseDate" type="text" class="form-control"id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="inputImage" class="form-label">Image URL</label>
                <input name="inputImage" class="form-control" type="file" id="formFile">
            </div>
            <div class="mb-3">
                <label for="inputImageBackground" class="form-label">Background URl</label>
                <input name="inputImageBackground" class="form-control" type="file" id="formFile">
            </div>

            <button type="submit" class="btn btn-success">Insert</button>
    </form>
</div>

@endsection
@include('footer')
