@extends('front.layout.master')
@section('head-tag')
    <title>سنگ الماس  |اشعار </title>
@endsection

    <style>
        body{
        background-color: transparent!important;
        background-image: linear-gradient(130deg,#E5F3FF 0%,#ECD5EB 100%)!important;
    }
    @media (max-width: 600px) {
        .navbar-brand span{
            display: none;
        }

    }
</style>
@include("front.layout.header")
@section('contain')

    <div class="header-sher " style="margin-right: 20px">
    <section class="pooster mt-5 pr-5">

        <div class="row">
            <div class="col-12 pooster-text">


                <div class="header-text-center-sher w-100 text-center">
                    <span class="">آمیزه‌ی هنر، خلاقیت و مهارت</span>
                    <h1 class=""> سنگ الماس</h1></div>
                <div class="banner-text-item-sher">
                    <h2>اشعار</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}">خانه</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">اشعار</li>
                        </ol>
                    </nav>
                </div>


            </div>

        </div>


    </section>
    <section class="caption">
        <div class="row">
            <div class="caption-header">

                <span class="fw-bold">{{$lyricCategory->name}}</span>

            </div>
        </div>
        <div class="row">
                    @foreach($lyrics as $post)
            <div class="col-md-3 col-6">
                <div class="caption-item caption-item-pedar">
                    <p>
                        {{ $post->body  }}
                            <span class="text-center">
                                <br>
                                <br>
                             {{ $post->name  }}
                        </span>

                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
            </div>
    {{ $lyrics->links('vendor.pagination.custom2') }}
@endsection
