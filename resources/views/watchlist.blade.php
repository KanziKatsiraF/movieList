@extends('navbaruser')
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">
                <div class="mt-5">
                    <h1> <img src="{{asset('save.png')}}" class="float:left;" alt="save" style="max-width:10%;max-height:10%;">My  <span class="text-danger">Watchlist</span> </h1>
                </div>
            </div>
        </div>
        
        <form class="d-sm-flex" action="{{ url('/addWatchlist') }}">
            <input class="form-control me-2" type="search" placeholder="Search your watchlist..." aria-label="Search" name="search" value="{{isset($se) == true ? $se : '' }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="row mt-5 justify-content-left">
            <div class="col-auto">
                <i class="fa-solid fa-filter fa-2x" style="color:grey;"></i>
            </div>
            <div class="col-auto">
                <form action="{{ url('/addWatchlist/filter') }}" method="post" style="floar:right;">
                @csrf
                    <select name="filter" class="btn btn-secondary" id="" onchange="this.form.submit()">
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <option value="" selected disabled>All</option>
                            <option value="Planned">Planned</option>
                            <option value="Watching">Watching</option>
                            <option value="Finished">Finished</option>
                        </ul>
                    </select>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td>Poster</td>
                        <td>Title</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($watchList as $i => $watch)
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$watch->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('addWatchlist.update', $watch->id)}}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <select name="status" class="form-control bg-dark text-white">
                                        <option value="Planned" {{$watch->status == 'Planned' ? 'selected' : ''}}>Planned</option>
                                        <option value="Watching" {{$watch->status == 'Watching' ? 'selected' : ''}}>Watching</option>
                                        <option value="Finished" {{$watch->status == 'Finished' ? 'selected' : ''}}>Finished</option>
                                        <option value="Remove">Remove</option>
                                    </select>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" type="submit" class="btn btn-danger">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>

                    <tr>
                        <th><img src="{{asset('storage/'.$watch->movie->image_url)}}" width="100px;height:100px;"></th>
                        <td>{{$watch->movie->title}}</td>
                        <td class="text-success">{{$watch->status == 'Planned' ? 'Planning' : $watch->status}}</td>
                        <td><button style="background-color:transparent;border:0;" class="text-white"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$watch->id}}">...</button></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" align="center">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
 @endsection
@include('footer')
