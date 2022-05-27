@extends('admin.layout.master')

@section('head-tag')
    <title>ایجاد اشعار</title>
@endsection

@section('contain')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{route('admin.home')}}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{route('admin.lyrics.post.index')}}">اشعار </a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد شعر جدید </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نوشتن شعر جدید
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.lyrics.post.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <div class="mx-auto mt-5 mb-5">
                    <h2 class="text-warning text-center" > قبل ایجاد شعر حتما باید یک دسته بندی برای شعرتان ساخته باشید</h2>
                </div>

                <section>
                    <form action="{{ route('admin.lyrics.post.store') }}" method="post"  id="form">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name"> نام شاعر </label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
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
                                        <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('status')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب دسته</label>
                                    <select name="category_id" id="" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($lyricCategories as $lyricCategory)
                                            <option value="{{ $lyricCategory->id }}" @if(old('category_id') == $lyricCategory->id) selected @endif>{{ $lyricCategory->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('category_id')
                                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">متن شعر</label>
                                    <textarea name="body" id="body"  class="form-control form-control-sm" rows="2">{{ old('body') }}</textarea>
                                </div>
                                @error('body')
                                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

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



