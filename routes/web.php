<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/insertDataMovie', [MovieController::class, 'insertDataMovie']);
Route::post('/insertDataActor', [MovieController::class, 'insertDataActor']);
Route::get('/home', [MovieController::class, 'homePage']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/profile', [AuthController::class, 'profile']);
Route::post('/profile', [AuthController::class, 'updateProfile']);
Route::post('/loginAction', [AuthController::class, 'loginAction']);
Route::post('/regisAction', [AuthController::class, 'regisAction']);
Route::get('/actordetail/{id}', [MovieController::class, 'actorDetail']);
Route::get('/moviedetail/{id}', [MovieController::class,'movieDetail']);
Route::get('/editmovie/{id}', [MovieController::class, 'editMovie']);
Route::get('/editActor/{id}', [MovieController::class, 'editActor']);
Route::post('/updateActor/{id}', [MovieController::class,'updateActor']);
Route::post('/update/{id}', [MovieController::class,'update']);
Route::delete('/movieDelete/{movie}',[MovieController::class,'movieDelete'])->name('movies.movieDelete');
Route::delete('/actorDelete/{actor}',[MovieController::class,'actorDelete'])->name('actors.actorDelete');
Route::get('/actorPage', [MovieController::class, 'actorPage']);
Route::get('/createMovie', [MovieController::class, 'createMovie'])->middleware('security');
Route::get('/profilePage', [MovieController::class, 'profilePage']);
Route::get('/watchlistPage', [MovieController::class, 'watchlistPage']);
Route::resource('/addWatchlist', WatchListController::class);
Route::post('/addWatchlist/filter', [WatchListController::class, 'filter']);
Route::get('/createActor', [MovieController::class, 'createActor'])->middleware('security');
Route::get('/viewMovie/search', [MovieController::class, 'viewPageSearchMovie']);
Route::get('/viewActor/search', [MovieController::class, 'viewPageSearchActor']);
Route::get('/test', [MovieController::class, 'test']);
