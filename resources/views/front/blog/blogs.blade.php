@extends('front.layout.master')
@section('head-tag')
<title>سنگ الماس  |مقالات </title>
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
    <div class="container">
        <!--    start header-->
        <div class="header-maghale ">

            <!--start pooster-->

            <section class="pooster mt-5">

                <div class="row">
                    <div class="col-12 pooster-text">


                        <div class="header-text-center-sher w-100 text-center">
                            <span class="">آمیزه‌ی هنر، خلاقیت و مهارت</span>
                            <h1 class=""> سنگ الماس</h1></div>
                        <div class="banner-text-item-sher">
                            <h2>مقالات</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('home')}}">خانه</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">مقالات</li>
                                </ol>
                            </nav>
                        </div>


                    </div>

                </div>


            </section>
            <!--            end pooster-->
        </div>
        <!--    end header-->

        <!--    start arshiv-->
        <main class="content">
            <aside class="master-1">
                <div class="header-arshiv mb-4">
                    <strong class="text">فهرست مطالب </strong>

                </div>
                <div class="main-t">

                    <ul>
                        @foreach($blogs as $blog)

                        <li style="width: 100% !important;">
                            <a href="{{ route('home.blog.show', $blog->id) }}">
                            <div class="main2 flex align-items-center justify-content-start">


                                    <img src="{{ asset($blog->image['indexArray']['small'] ) }}"/>

                                <div class="c3 ">
                                    <h4>{{ $blog->name }}</h4>

                                    <div class="text-2 ">

                                        <p>{{Str::limit($blog->body, 200)}}</p>
                                    </div>
                                </div>

                            </div>

                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </aside>

        </main>
    </div>
    {{ $blogs->links('vendor.pagination.custom2') }}
        <!--    end arshiv-->


@endsection
