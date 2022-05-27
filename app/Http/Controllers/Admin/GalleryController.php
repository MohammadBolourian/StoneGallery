<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
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
            $galleries = gallery::where('name' ,'LIKE' , "%$search%")->paginate(20);
        }
        else {
            $galleries = gallery::orderBy('created_at', 'desc')->paginate(20);
        }
        $date = compact('galleries','search');
        return view('admin.gallery.index')->with($date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request ,  ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'gallery-images');
            $result = $imageService->createIndexAndSave($request->file('image'));
// ====================>size hay mored stefade dar gallery az inja moshakhas mishavad
            $result['currentImage'] = $inputs['currentImage'];
        }
        if($result === false)
        {
            return redirect()->route('admin.gallery.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        $gallery = gallery::create($inputs);
        return redirect()->route('admin.gallery.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');

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
    public function edit(gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request , gallery $gallery , ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            if(!empty($gallery->image))
            {
                $imageService->deleteDirectoryAndFiles($gallery->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'gallery-images');
            $result = $imageService->createIndexAndSave($request->file('image'));
            // taghir size dar update
            $result['currentImage'] = $inputs['currentImage'];
            if($result === false)
            {
                return redirect()->route('admin.gallery.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else{
            if(isset($inputs['currentImage']) && !empty($gallery->image))
            {
                $image = $gallery->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $gallery->update($inputs);
        return redirect()->route('admin.gallery.index')->with('alert-section-success', 'دسته بندی جدید شما با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery $gallery)
    {
        $result = $gallery->delete();
        return redirect()->route('admin.gallery.index')
            ->with('swal-success','دسته بندی با موفقیت حذف شد');
    }

    public function status(gallery $gallery ){

        $gallery->status = $gallery->status == 0 ? 1 : 0;
        $result = $gallery->save();
        if($result){
            if($gallery->status == 0){
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
