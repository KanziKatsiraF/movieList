<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


public function login (){
    return view('login');
}
public function register (){
    return view('register');
}

public function loginAction(Request $request)
{
    //VALIDATE INPUT
    $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6',
    ]);

    //CREDENTIALS
    $credentials = [
        'email'=>$request->email,
        'password'=>$request->password
    ];

    if($request->has('remember_me')){
        Cookie::queue('mycookie',$request->email,120);
    }

    //SET COOKIE
    if(Auth::attempt($credentials)){
        Session::put('mysession',$credentials);
        return redirect('/')->withSuccess('Succesfuly Loggedin');
    };

    //ATTEMPT LOGIN

    //REDIRECT WITH ERROR
    return redirect()->back()->withErrors('Wrong credentials');
}

public function regisAction(Request $request)
{
    //VALIDATE INPUT
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password' => 'required|min:6',
        'phone'=>'required|numeric'

    ]);

    //CREATE USER
    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'dob'=>$request->dob,
        'password'=>Hash::make($request->password)

    ]);
    return redirect("login");
}

public function logout(){
    $user = Auth::user();
    Auth::logout($user);
    return redirect('login');
}

public function profile(){
    return view('profile');
}

public function updateProfile(Request $request){
    //VALIDATE INPUT
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'dob'=>'required',
        'phone'=>'required|min:5'
    ]);
    $user = User::where('id',Auth::user()->id)->first();
    $user->update($request->all());
    return redirect()->back();
}

}
