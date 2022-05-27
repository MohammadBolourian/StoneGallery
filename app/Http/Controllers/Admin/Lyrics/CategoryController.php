<?php

namespace App\Http\Controllers\Admin\Lyrics;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lyric\LyricCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\LyricCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lyricCategories = LyricCategory::all();
        return view('admin.lyrics.category.index' , compact('lyricCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.lyrics.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LyricCategoryRequest $request ,  ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'lyric-category');
            $result = $imageService->createIndexAndSave($request->file('image'));

        }
        if($result === false)
        {
            return redirect()->route('admin.lyrics.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        $lyricCategory= LyricCategory::create($inputs);
        return redirect()->route('admin.lyrics.category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LyricCategory $lyricCategory)
    {
        return view('admin.lyrics.category.edit', compact('lyricCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LyricCategoryRequest $request, LyricCategory $lyricCategory , ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            if(!empty($lyricCategory->image))
            {
                $imageService->deleteDirectoryAndFiles($lyricCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'lyric-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.lyrics.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else{
            if(isset($inputs['currentImage']) && !empty($lyricCategory->image))
            {
                $image = $lyricCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $lyricCategory->update($inputs);
        return redirect()->route('admin.lyrics.category.index')->with('alert-section-success', 'دسته بندی جدید شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LyricCategory $lyricCategory)
    {

        $result = $lyricCategory->delete();
        return redirect()->route('admin.lyrics.category.index')
            ->with('swal-success','دسته بندی با موفقیت حذف شد');
    }


    public function status(LyricCategory $lyricCategory){

        $lyricCategory->status = $lyricCategory->status == 0 ? 1 : 0;
        $result = $lyricCategory->save();
        if($result){
            if($lyricCategory->status == 0){
                return response()->json(['status' => true, 'checked' => false]);
            }
            else{
                return response()->json(['status' => true, 'checked' => true]);
            }
        }
        else{
            return response()->json(['status' => false]);
        }

    }
}
