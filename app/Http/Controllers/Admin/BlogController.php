<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
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
            $blogs = Blog::where('name' ,'LIKE' , "%$search%")->paginate(10);
        }
        else {
            $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);
        }
        $date = compact('blogs','search');
        return view('admin.blog.index')->with($date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'blogs-images');
        $result = $imageService->createIndexAndSave($request->file('image'));
        if($result === false)
        {
            return redirect()->route('admin.blog.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        $blogs =Blog::create($inputs);
        return redirect()->route('admin.blog.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
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
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request,Blog $blog ,ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            if(!empty($blog->image))
            {
                $imageService->deleteDirectoryAndFiles($blog->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'blogs-images');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.blog.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else{
            if(isset($inputs['currentImage']) && !empty($blog->image))
            {
                $image = $blog->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $blog->update($inputs);
        return redirect()->route('admin.blog.index')->with('swal-success', ' مقاله شما با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $result = $blog->delete();
        return redirect()->route('admin.blog.index')
            ->with('swal-success',' مقاله با موفقیت حذف شد');
    }

    public function status(Blog $blog ){

        $blog->status = $blog->status == 0 ? 1 : 0;
        $result = $blog->save();
        if($result){
            if($blog->status == 0){
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
