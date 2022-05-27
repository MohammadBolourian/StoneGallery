@extends('front.layout.master')
@section('head-tag')
    <title>سنگ الماس | گالری  </title>
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
    @include("front.layout.modal")
    <div class="container-fluid">
        <div class="row">
            <div class="header-gallery">

                <!--start pooster-->

                <section class="pooster mt-5">

                    <div class="row">
                        <div class="col-12 pooster-text">


                            <div class="header-text-center-gallery w-100 text-center">
                                <span class="">آمیزه‌ی هنر، خلاقیت و مهارت</span>
                                <h1 class=""> سنگ الماس</h1></div>
                            <div class="banner-text-item-gallery">
                                <h2>گالری</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('home')}}">خانه</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">گالری</li>
                                    </ol>
                                </nav>
                            </div>


                        </div>

                    </div>


                </section>
                <!--            end pooster-->
            </div>
            <div class="main">

                <!--start gallery-->

                <section class="grid">
                    <div class="grid-col grid-col--1">

                    </div>
                    <div class="grid-col grid-col--2">

                    </div>
                    <div class="grid-col grid-col--3">

                    </div>
                    <div class="grid-col grid-col--4">

                    </div>
                    @foreach($galleries as $gallery)
                    <div class="grid-item">
                        <a href="#" class="grid-link" >
                            <img src="{{ asset($gallery->image['indexArray'][$gallery->image['currentImage']] ) }}" alt="{{$gallery->name}}"  data-bs-toggle="modal" data-bs-target="#mymodal">
                            <div class="grid-caption">
                                <span>مشخصات:</span>
                                <h5>
                                    {{$gallery->name}}
                                </h5>
                            </div>
                        </a>

                    </div>
                    @endforeach
                </section>
            </div>
            </div>
            </div>

                <!--end gallery-->
    {{ $galleries->links('vendor.pagination.custom2') }}
    @endsection
@section('script')
    <script>
        var colc = new Colcade( '.grid', {
            columns: '.grid-col',
            items: '.grid-item'
        });

        $('.grid-link').click(function (){

            var z=$(this).find('img').attr('src');
            var x=$(this).find('.grid-caption h5').html();
            $('.modal-img img').attr('src',z);
            $('.modal-caption h4').html(x);
        })
        $(window).scroll(function (){
            console.log($(window).scrollTop());
            if ($(window).scrollTop()> 1340){
                $('.tel-fix').hide();
            }
            else {
                $('.tel-fix').show();
            }
        });


    </script>
    @endsection
