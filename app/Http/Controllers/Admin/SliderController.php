<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

        public function store(SliderRequest $request, ImageService $imageService)
    {

        $inputs = $request->all();


        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'sliders-images');
        $result = $imageService->fitAndSave($request->file('image'), 1300, 700);
        if ($result === false) {
            return redirect()->route('admin.slider.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        Slider::create($inputs);
        return redirect()->route('admin.slider.index')->with('swal-success', ' اسلایدر جدید شما با موفقیت ثبت شد');

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider , ImageService $imageService)
    {
        $inputs = $request->all();

        if($request->hasFile('image'))
        {
            if(!empty($slider->image))
            {
                $imageService->deleteDirectoryAndFiles($slider->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'sliders-images');
            $result = $imageService->fitAndSave($request->file('image'), 1300, 700);
            if($result === false)
            {
                return redirect()->route('admin.slider.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $slider->update($inputs);
        return redirect()->route('admin.slider.index')->with('swal-success', ' اسلایدر شما با موفقیت ویرایش شد');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $result =$slider ->delete();
        return redirect()->route('admin.slider.index')->with('swal-success', ' اسلایدر شما با موفقیت حذف شد');

    }

    public function status(Slider $slider)
    {

        $slider->status = $slider->status == 0 ? 1 : 0;
        $result = $slider->save();
        if ($result) {
            if ($slider->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
