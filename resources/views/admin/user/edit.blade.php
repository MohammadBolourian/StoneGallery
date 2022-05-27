@extends('admin.layout.master')

@section('head-tag')
    <title>ویرایش  مدیر </title>
@endsection

@section('contain')

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش مدیر
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.home') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.update',$user->id) }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">نام کامل</label>
                                    <input type="text" class="form-control form-control-sm name" name="name" id="name" value="{{ old('name', $user->name) }}">
                                    <span class="error text-danger"></span>
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
                                    <label for="phone">شماره تماس</label>
                                    <input type="text" class="form-control form-control-sm" name="mobile" id="phone" value="{{ old('mobile',$user->mobile) }}">
                                </div>
                                @error('mobile')
                                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>
{{--                            <section class="col-12 col-md-6 my-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="email">ایمیل </label>--}}
{{--                                    <input type="email" class="form-control form-control-sm email" name="email" id="emailAdress" value="{{ old('email',$user->email) }}">--}}
{{--                                    <span class="error text-danger"></span>--}}
{{--                                </div>--}}

{{--                                @error('email')--}}
{{--                                <span class=" bg-danger text-white p-1 rounded" role="alert">--}}
{{--                                    <strong>--}}
{{--                                        {{ $message }}--}}
{{--                                    </strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </section>--}}
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label > کلمه عبور</label>
                                    <input type="password" class="form-control form-control-sm pass" name="password" id="password">
                                    <span class="error text-danger"></span>
                                </div>
                                @error('password')
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


                            <section class="col-12 my-3">
                                <button id="sub" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection

