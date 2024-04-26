
@extends('navbaruser')
@section('body')
<div class="d-flex flex-column align-items-center mt-4">
    <p id="title" class="fs-1 fw-bold text-white">Add Actor</p>
    <form enctype="multipart/form-data"  method="POST"  action='/insertDataActor' class="d-flex flex-column align-items-center text-white bg-dark">
            {{-- CSRF --}}
            @csrf
            <div class="mb-3 w-100">
                <label for="InputName" class="form-label">Name</label>
                <input name="inputName" type="text" class="form-control" @yield('nameValue') id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-100">
                <label for="inputGender" class="form-label">Gender</label>
                <select name="inputGender" class="form-select mt-2" aria-label="Default select example">
                <option value="male">male</option>
                <option value="female">female</option>
                </select>
            </div>
            <div class="mb-3 w-100">
                <label for="inputDescription" class="form-label">Description</label>
                <textarea name="inputBiography" type="textarea" class="form-control" id="exampleInputPassword1">@yield('descriptionValue')</textarea>
            </div>
            <div class="mb-3 w-100">
                <label for="InputDOB" class="form-label">Date Of Birth</label>
                <input name="inputDOB" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-100">
                <label for="InputPOB" class="form-label">Place Of Birth</label>
                <input name="inputPOB" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="inputImage" class="form-label">Image URL</label>
                <input name="inputImage" class="form-control" type="file" id="formFile">
            </div>
            <div class="mb-3 w-100">
                <label for="InputPopularity" class="form-label">Popularity</label>
                <input name="inputPopularity" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>


            <button type="submit" class="btn btn-success">Insert</button>
    </form>
</div>

@endsection
@include('footer')
