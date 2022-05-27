@extends("admin.layout.master")

    @section("head-tag")
        <title>داشبورد اصلی</title>
        @endsection

    @section("contain")
<style>


    .bg-black {
        background: #000
    }

    .skill-block {
        width: 30%
    }

    @media (min-width: 991px) and (max-width:1200px) {
        .skill-block {
            padding: 32px !important
        }
    }

    @media (min-width: 1200px) {
        .skill-block {
            padding: 56px !important
        }
    }

    body {
        background-color: #eeeeee
    }
</style>
        <div>
            <div class="container mt-5 mb-5">
                <div class="row no-gutters">
{{--                    akx dar size shomare 2 estefade shavad--}}

                    <div class="col-    md-4 col-lg-4"><img style="width:100%; height: 100%" src="{{ asset( $LoggedUserInfo['image']['indexArray']['medium'] ) }}"></div>
                    <div class="col-md-8 col-lg-8">
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
                                <h3 class="display-5">{{ $LoggedUserInfo['name'] }}  عزیز خوش آمدید</h3><i class="fa fa-facebook"></i><i class="fa fa-google"></i><i class="fa fa-youtube-play"></i><i class="fa fa-dribbble"></i><i class="fa fa-linkedin"></i>
                            </div>
                            <div class="p-3 bg-black text-white">
                                <h6>پنل مدیریت سنگ الماس</h6>
                            </div>
                            <div class="d-flex flex-row text-white">
                                <div class="p-4 bg-primary text-center skill-block">
                                    <h4>{{$galleryCount}}</h4>
                                    <h6>تصویر گالری</h6>
                                </div>
                                <div class="p-3 bg-success text-center skill-block">
                                    <h4>{{$blogCount}}</h4>
                                    <h6>مقالات</h6>
                                </div>
                                <div class="p-3 bg-warning text-center skill-block">
                                    <h4>{{$lyricsCount}}</h4>
                                    <h6>اشعار</h6>
                                </div>
                                <div class="p-3 bg-danger text-center skill-block">
                                  <a href="{{ route('admin.user.edit',  $LoggedUserInfo['id']) }}">  <h4 class="text-center"> ویرایش اطلاعات</h4></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <section class="row">

                <section class="col-lg-6 col-md-6 col-12">
                    <a href="#" class="text-decoration-none d-block mb-4">
                        <section class="card bg-custom-yellow text-white">
                            <section class="card-body">
                                <section class="d-flex justify-content-between">
                                    <section class="info-box-body">
                                        <h5>تعداد تصاویر گالری : {{$galleryCount}} عدد</h5>
                                        <p> اخرین تصویر :  {{$gallery->name}}</p>
                                    </section>
                                    <section class="info-box-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </section>
                                </section>
                            </section>
                            <section class="card-footer info-box-footer">
                                <i class="fas fa-clock mx-2"></i> به روز رسانی شده در :{{$gallery->created_at}}
                            </section>
                        </section>
                    </a>
                </section>
                <section class="col-lg-6 col-md-6 col-12">
                    <a href="#" class="text-decoration-none d-block mb-4">
                        <section class="card bg-custom-green text-white">
                            <section class="card-body">
                                <section class="d-flex justify-content-between">
                                    <section class="info-box-body">
                                        <h5>تعداد مقالات  : {{$blogCount}} عدد</h5>
                                        <p> اخرین مقاله : {{$blog->name}}</p>
                                    </section>
                                    <section class="info-box-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </section>
                                </section>
                            </section>
                            <section class="card-footer info-box-footer">
                                <i class="fas fa-clock mx-2"></i> به روز رسانی شده در :{{$blog->created_at}}
                            </section>
                        </section>
                    </a>
                </section>
                <section class="col-lg-6 col-md-6 col-12">
                    <a href="#" class="text-decoration-none d-block mb-4">
                        <section class="card bg-custom-pink text-white">
                            <section class="card-body">
                                <section class="d-flex justify-content-between">
                                    <section class="info-box-body">
                                        <h5>تعداد دسته بندی اشعار  :{{$categoryCount}} عدد</h5>
                                        <p> اخرین دسته بندی ساخته شده : {{$cat->name}} </p>
                                    </section>
                                    <section class="info-box-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </section>
                                </section>
                            </section>
                            <section class="card-footer info-box-footer">
                                <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{$cat->created_at}}
                            </section>
                        </section>
                    </a>
                </section>
                <section class="col-lg-6 col-md-6 col-12">
                    <a href="#" class="text-decoration-none d-block mb-4">
                        <section class="card bg-primary text-white">
                            <section class="card-body">
                                <section class="d-flex justify-content-between">
                                    <section class="info-box-body">
                                        <h5>تعداد اشعار  : {{$lyricsCount}} عدد</h5>
                                        <p> اخرین شعر : {{$lyric->body}}</p>
                                    </section>
                                    <section class="info-box-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </section>
                                </section>
                            </section>
                            <section class="card-footer info-box-footer">
                                <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{$lyric->created_at}}
                            </section>
                        </section>
                    </a>
                </section>


            </section>


    @endsection
