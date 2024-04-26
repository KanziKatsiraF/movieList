<?php

namespace App\Http\Controllers;

use App\Models\Actors;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    //
    public function insertDataMovie(Request $request){
        $image = $request->file('inputImage');
        $imageName = $image->getClientOriginalName();

        $imageBackground = $request->file('inputImageBackground');
        $inputBackgroundName = $imageBackground->getClientOriginalName();


        Storage::putFileAs('public/images', $image, $imageName);
        $imageUrl = $imageName;

        Storage::putFileAs('public/images', $imageBackground, $inputBackgroundName);
        $imageUrlBackground = $inputBackgroundName;

        $watchlist = 0;


        $request->validate([
            'inputTitle'=>'required|min:2|max:50',
            'inputDescription'=>'required|min:5',
            'inputGenre'=>'required',
            'inputActor'=>'required',
            'inputDirector'=>'required|min:3',
            'inputReleaseDate'=>'required',
            'inputImage'=>'required',
            'inputImageBackground'=>'required'
        ]);

        DB::table('movies')->insert([
            'title' => $request->inputTitle,
            'description'=>$request->inputDescription,
            'genre'=>$request->inputGenre,
            'actors_id'=>$request->inputActor,
            'director'=>$request->inputDirector,
            'release_date'=>$request->ReleaseDate,
            'image_url'=>$imageUrl,
            'background_url'=>$imageUrlBackground,
            'watchlist_count'=>$watchlist,
        ]);
        return redirect('/');
    }

    public function insertDataActor(Request $request){
        $image = $request->file('inputImage');
        $imageName = $image->getClientOriginalName();

        Storage::putFileAs('public/images', $image, $imageName);
        $imageUrl = $imageName;

            $request->validate([
            'inputName'=>'required|min:5',
            'inputGender'=>'required',
            'inputBiography'=>'required|max:10',
            'inputDOB'=>'required',
            'inputPOB'=>'required',
            'inputImage'=>'required',
            'inputPopularity'=>'required'
            ]);


        DB::table('actors')->insert([
            'Name'=>$request->inputName,
            'Gender'=>$request->inputGender,
            'Biography'=>$request->inputBiography,
            'DateOfBirth'=>$request->inputDOB,
            'PlaceOfBirth'=>$request->inputPOB,
            'image_url'=>$imageUrl,
            'popularity'=>$request->inputPopularity,
        ]);
        return redirect('/');
    }
    public function viewPageSearchActor(Request $request){

        $actors=Actors::where('Name', 'LIKE',"%$request->search%")->simplePaginate(10);
        return view('actorpage')->with('actors',$actors);
    }
    public function viewPageSearchMovie(Request $request){
        $movies=Movies::where('title', 'LIKE',"%$request->search%")->simplePaginate(10);
        $moviess=Movies::simplePaginate(1);
        $moviesss = Movies::where('id','=',"3")->get();
        $moviessss = Movies::where('id','=',"4")->get();
        return view('homepage',compact('moviesss','moviessss'))->with('movies', $movies)->with('moviess', $moviess);
    }
    public function homePage(){
        $movies=Movies::simplePaginate(10);
        $moviess=Movies::simplePaginate(1);
        $moviesss = Movies::where('id','=',"3")->get();
        $moviessss = Movies::where('id','=',"4")->get();
        return view ('homepage', compact('moviesss','moviessss'))->with('movies', $movies)->with('moviess', $moviess);
    }
    public function actorDetail($id){
        $actors=Actors::find($id);


        return view ('actordetail')->with('actors',$actors);
    }
    public function movieDetail($id){
        $movies=Movies::find($id);
        $moviess = Movies::where('id','!=',"$id")->get();
        $moviesActor = Actors::select('*')
        ->join('movies','Actors.id', 'movies.actors_id')
        ->where('movies.id','=',"$id")
        ->get();

        return view ('moviedetail', compact('moviess','moviesActor'))->with('movies',$movies);
    }
    public function actorPage(){
        $actors=Actors::simplePaginate(10);
        return view ('actorpage')->with('actors', $actors);
    }
    public function createMovie(){
        $movies=Movies::simplePaginate(10);
        $moviesActor = Actors::select('*')
        ->join('movies','Actors.id', 'movies.actors_id')->get();
        return view ('createmovie', compact('moviesActor'))->with('movies', $movies);
    }
    public function editActor($id){
        $actors = Actors::find($id);
        return view ('editactor',compact('actors'));
    }
    public function editMovie($id){
        $movie = Movies::find($id);
        $movies=Movies::simplePaginate(10);
        $moviesActor = Actors::select('*')
        ->join('movies','Actors.id', 'movies.actors_id')->get();

        return view ('editmovie', compact('movie','moviesActor'))->with('movies', $movies);
    }

    public function update(Request $request, $id ){
        // $request->validate([
        //     'inputTitle'=>'required|min:2',
        //     'inputDescription'=>'required|min:5',
        //     'inputGenre'=>'required',
        //     'inputActor'=>'required',
        //     'inputDirector'=>'required|min:3',
        //     'inputReleaseDate'=>'required',
        //     'inputImage'=>'required',
        //     'inputImageBackground'=>'required'
        // ]);

        $title = $request->input('inputTitle');
        $description=$request->input('inputDescription');
        $genre=$request->input('inputGenre');
        $actors_id=$request->input('inputActor');
        $director =$request->input('inputDirector');
        $release_date=$request->input('inputReleaseDate');

        $image = $request->file('inputImage');
        $imageName = $image->getClientOriginalName();

        $imageBackground = $request->file('inputImageBackground');
        $inputBackgroundName = $imageBackground->getClientOriginalName();

        Storage::putFileAs('public/images', $image, $imageName);
        $imageUrl = $imageName;

        Storage::putFileAs('public/images', $imageBackground, $inputBackgroundName);
        $imageUrlBackground = $inputBackgroundName;

        $watchlist = 0;



        DB::update('update `movies` set `title` = ?, `description`= ?,`genre`=?,`actors_id`=?,`director`=?,`release_date`=?,`image_url`=?,`background_url`=?,`watchlist_count`=?
         where id = ?',[$title,$description,$genre,$actors_id,$director,$release_date,$imageUrl,$imageUrlBackground,$watchlist,$id]);
        return redirect('/');
    }

    public function updateActor(Request $request, $id ){

        $image = $request->file('inputImage');
        $imageName = $image->getClientOriginalName();

        Storage::putFileAs('public/images', $image, $imageName);
        $imageUrl = $imageName;

        $request->validate([
            'inputName'=>'required|min:5',
            'inputGender'=>'required',
            'inputBiography'=>'required|max:10',
            'inputDOB'=>'required',
            'inputPOB'=>'required',
            'inputImage'=>'required',
            'inputPopularity'=>'required'
            ]);

            $Name=$request->input('inputName');
            $Gender=$request->input('inputGender');
            $Biography=$request->input('inputBiography');
            $DateOfBirth=$request->input('inputDOB');
            $PlaceOfBirth=$request->input('inputPOB');
            $image_url=$imageName;
            $popularity=$request->input('inputPopularity');

        DB::update('update `actors` set `Name` = ?, `Gender`= ?,`Biography`= ?,`DateOfBirth`=?,`PlaceOfBirth`=?,`image_url`=?,`popularity`=?
         where id = ?',[$Name,$Gender,$Biography,$DateOfBirth,$PlaceOfBirth,$image_url,$popularity,$id]);
        return redirect('/');
    }

    public function loginPage(){

        return view ('login');
    }

    public function profilePage(){

        return view ('profilepage');
    }
    public function registerPage(){

        return view ('register');
    }
    public function watchlistPage(){

        return view ('watchlist');
    }
    public function createActor(){

        return view ('createactor');
    }

    public function movieDelete(Movies $movie){

        $movie->delete();
        return redirect('/');
    }
    public function actorDelete(Actors $actor){
        $actor->delete();
        return redirect('/');
    }
}
