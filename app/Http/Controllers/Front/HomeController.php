<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\gallery;
use App\Models\Lyric;
use App\Models\LyricCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $lyricCategories = LyricCategory::all();
        return view('front.index',compact('sliders','lyricCategories'));
    }

    public function lyricCategory(LyricCategory $lyricCategory)
    {

        $lyricCategories=LyricCategory::all();
        $lyrics = Lyric::where('category_id' ,'=',"$lyricCategory->id")->where('status', '=' , '1')->orderBy('created_at', 'desc')->paginate(2);
        return view('front.lyrics.lyric',compact('lyrics','lyricCategory','lyricCategories'));
    }

    public function work()
    {
        $lyricCategories=LyricCategory::all();
        return view('front.work.work',compact('lyricCategories'));
    }
    public function gallery()
    {
        $lyricCategories=LyricCategory::all();
        $galleries = gallery::where('status', '=' , '1')->orderBy('created_at', 'desc')->paginate(20);
        return view('front.gallery.gallery',compact('lyricCategories','galleries'));
    }

    public function blog()
    {
        $lyricCategories=LyricCategory::all();
        $blogs = Blog::where('status', '=' , '1')->orderBy('created_at', 'desc')->paginate(6);
        return view('front.blog.blogs',compact('lyricCategories','blogs'));
    }

    public function blogShow(Blog $blog)
    {
        $lyricCategories=LyricCategory::all();
        return view('front.blog.show', compact('blog','lyricCategories'));
    }
}
