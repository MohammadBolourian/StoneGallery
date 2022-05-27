@extends('admin.layout.master')

@section('head-tag')
    <title>ویرایش تصاویر گالری</title>
@endsection

@section('contain')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{route('admin.home')}}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{route('admin.gallery.index')}}">گالری</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش تصاویر گالری</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش تصاویر گالری
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.gallery.update' , $gallery->id) }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">عنوان تصویر</label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ old('name',$gallery->name ) }}">
                                </div>
                                @error('name')
                                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>



                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">نمایش در سایت</label>
                                    <select name="status"  class="form-control form-control-sm" id="status">
                                        <option value="0" @if(old('status', $gallery->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status', $gallery->status) == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('status')
                                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="image">
                                </div>
                                @error('image')
                                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <div class="col-12 mt-5 mb-5">
                                <h2 class="text-warning text-center">با توجه به عکس نحوه نمایش صحیح آن را در گالری مشخص کنید</h2>
                            </div>
{{--//////============================>>>> ba in ravesh dar moghe upload akx size mored estefade ro ham moshakhas mikonim --}}
                         <div class="col-12 mx-auto">
                             <section class="row">

                                 <div class="form-check col" style="cursor: pointer">
                                   <a> <img src="{{ asset('admin-assets/images/1.jpg') }}"></a>
                                     <input type="radio" class="form-check-input" name="currentImage" value="medium" @if($gallery->image['currentImage'] == 'medium') checked @endif  >
                                 </div>
                                 <div class="form-check col" style="cursor: pointer">
                                     <a> <img src="{{ asset('admin-assets/images/2.jpg') }}"></a>
                                     <input type="radio" class="form-check-input" name="currentImage" value="small"  @if($gallery->image['currentImage'] == 'small') checked @endif>
                                 </div>
                                 <div class="form-check col" style="cursor: pointer">
                                     <a> <img src="{{ asset('admin-assets/images/3.jpg') }}"></a>
                                     <input type="radio"  class="form-check-input" name="currentImage" value="large"  @if($gallery->image['currentImage'] == 'large') checked @endif>
                                 </div>
                             </section>
                         </div>


                            <section class="col-12 my-3">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection

@section('script')
    <script>

        $("a").click(function() {
            $(this).next().prop("checked", true);
        });
    </script>
@endsection
