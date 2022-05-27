<?php

namespace App\Http\Controllers\Admin\Lyrics;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lyric\PostRequest;
use App\Models\Lyric;
use App\Models\LyricCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search !=""){
            //shart vase search !
            $posts = Lyric::where('body' ,'LIKE' , "%$search%")->orwhere('name' ,'LIKE' , "%$search%")->paginate(16);
        }
        else {
            $posts = Lyric::orderBy('created_at', 'desc')->paginate(16);
        }
        $date = compact('posts','search');
        return view('admin.lyrics.post.index')->with($date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lyricCategories = LyricCategory::all();
        return view('admin.lyrics.post.create',compact('lyricCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $inputs = $request->all();
        $post = Lyric::create($inputs);
        return redirect()->route('admin.lyrics.post.index')->with('swal-success', 'پست  جدید شما با موفقیت ثبت شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lyric $lyric
     * @return \Illuminate\Http\Response
     */
    public function edit(Lyric $lyric)
    {
        $lyricCategories = LyricCategory::all();
        return view('admin.lyrics.post.edit', compact('lyric','lyricCategories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Lyric $lyric)
    {
        $inputs = $request->all();
        $lyric->update($inputs);
        return redirect()->route('admin.lyrics.post.index')->with('swal-success', 'پست  شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lyric $lyric)
    {
        $result = $lyric->delete();
        return redirect()->route('admin.lyrics.post.index')->with('swal-success', 'پست  شما با موفقیت حذف شد');
    }
    public function status(Lyric $lyric)
    {

        $lyric->status = $lyric->status == 0 ? 1 : 0;
        $result = $lyric->save();
        if ($result) {
            if ($lyric->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
