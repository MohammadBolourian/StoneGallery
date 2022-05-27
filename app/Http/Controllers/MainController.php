<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\gallery;
use App\Models\Lyric;
use App\Models\LyricCategory;
use App\Models\User;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function check(Request $request)
    {
        //Validate requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
            'g-recaptcha-response' => ['required', new Recaptcha]
            ],['g-recaptcha-response.required' =>'لطفا روی من ربات نیستم کلیک کنید'
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'ایمیل و نام کاربری اشتباه است');
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect()->route('admin.home');

            } else {
                return back()->with('fail', 'پسورد اشتباه است');
            }
        }
    }

    function dashboard(){
        $galleryCount = gallery::count();
        $lyricsCount = Lyric::count();
        $blogCount = Blog::count();
        $categoryCount = LyricCategory::count();
        $gallery=gallery::orderBy('created_at', 'desc')->first();
        $lyric=Lyric::orderBy('created_at', 'desc')->first();
        $blog=Blog::orderBy('created_at', 'desc')->first();
        $cat=LyricCategory::orderBy('created_at', 'desc')->first();
        $count =compact('galleryCount','lyricsCount','blogCount','categoryCount','gallery','lyric','blog','cat');
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin.index', $count, $data);
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect()->route('home');
        }
    }

}
