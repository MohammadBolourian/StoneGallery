@extends('front.layout.master')
@section('head-tag')
    <title>سنگ الماس  |مقاله </title>
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
                                    <li class="breadcrumb-item active" aria-current="page">مقاله</li>
                                </ol>
                            </nav>
                        </div>


                    </div>

                </div>


            </section>
            <!--            end pooster-->
        </div>
        <main class="content">
            <aside class="master-1">
                <div class="main-t bg-white">
                    <article>

                        <div class="article-header ">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <img src="{{ asset($blog->image['indexArray']['medium'] ) }}"/>
                                </div>
                                <div class="col-md-8">
                                    <h1 class="">{{$blog->name}}</h1>

                                    <span class="d-block text-author text-muted">{{$blog->updated_at}} </span>

                                </div>


                            </div>
                        </div>

                        <div class="article-body">
                                <div class="row mt-5 p-5">
                                <p>
                                    {{$blog->body}}
                                </p>

                            </div>


                        </div>

                    </article>


                    <div class="article-source-row">
            <?php  $word_array = explode( ',', $blog->tags );

                        ?>
                        <span class="article-source-span"> برچسب ها:</span>
            @foreach($word_array as $w)
        <span class="article-source-link"><a href="#{{$w}}">{{$w}} </a></span>
        @endforeach
                    </div>

                </div>
            </aside>

        </main>
    </div>
    @endsection
