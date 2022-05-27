@extends('front.layout.master')
@section('head-tag')
    <title>سنگ الماس  | آمیزه‌ی هنر، خلاقیت و مهارت</title>
@endsection
@section('contain')

    @include("front.layout.modal")

        <div class="row">
    <div class="header">
        <div style="width: 101%">
            <div class="">
                <!--start navbar-->
                <nav class="navbar  navbar-expand-lg">
                    <div class="container-fluid">
                        <a href="{{route('home')}}" class="navbar-brand ">
                            <img src="{{asset('front-assets/img/الماس.jpg')}}" alt="سنگ الماس"> <span>سنگ الماس</span></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <input type="checkbox" id="check" class="checkbox" hidden>
                            <div class="hamburger-menu">
                                <label for="check" class="menu">
                                    <div class="menu-line menu-line-1"></div>
                                    <div class="menu-line menu-line-2"></div>
                                    <div class="menu-line menu-line-3"></div>
                                </label>
                            </div>
                        </button>



                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class=" nav navbar-nav ">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.gallery')}}"
                                       style=" margin-right: 5px">گالری
                                    </a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.blog')}}"
                                       style=" margin-right: 5px">مقالات
                                    </a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style=" margin-right: 5px">
                                        اشعار
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($lyricCategories as $lyricCategory)
                                            @if($lyricCategory->status==1)
                                                <li><a class="dropdown-item" href="{{route('home.category',$lyricCategory->id)}}">{{$lyricCategory->name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.work')}}"
                                       style=" margin-right: 5px">همکاری با ما
                                    </a></li>



                                <li class="nav-item "><a class="nav-link " href="#contact-us">ارتباط با ما</a>

                                </li>
                            </ul>
                        </div>
                        <span class="navbar-i">
                        <button type="button" class="btn border-dark ">
                            <span class="d-block">
                                09120494968</span>
                            <span class="d-block">اسماعیلی</span>



                        </button>
                        <button type="button" class="btn border-dark" >
                            <span class="d-block">09121238101</span>

                            <span class="d-block">فرامرزی</span>
                        </button>

                    </span>

                    </div>
                </nav>
            </div>
        </div>


        <section class="pooster mt-5">
        <svg id="hero_shape2_normal"  style="display: inline;">
            <defs>
                <linearGradient id="PSgrad_0" x1="0%" x2="76.604%" y1="64.279%" y2="0%">
                    <stop offset="0%" stop-color="#9046cf" stop-opacity="1"></stop>
                    <stop offset="100%" stop-color="#fffcf2" stop-opacity="1"></stop>
                </linearGradient>
            </defs>
            <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M0.000,246.000 C0.000,246.000 326.728,190.237 710.653,123.017 C937.017,83.384 1398.662,3.976 1398.662,3.976 C1398.662,3.976 1524.189,5.641 1668.565,26.591 C1813.299,47.594 1920.000,84.745 1920.000,84.745 L1920.000,323.000 L0.000,323.000 L0.000,246.000 Z"></path>
            <path fill="url(#PSgrad_0)" d="M0.000,323.249 C0.000,-57.945 0.000,623.445 0.000,242.251 C0.000,242.251 141.533,218.272 347.776,183.613 C479.132,161.538 636.827,133.656 800.746,105.827 C943.681,81.561 1097.680,52.804 1239.269,28.559 C1291.889,19.548 1358.059,5.849 1393.180,1.251 C1434.086,-4.103 1581.001,11.184 1661.097,24.221 C1818.678,49.869 1920.000,84.251 1920.000,84.251 L1920.000,190.407 C1813.062,96.085 1433.376,28.053 1285.064,28.053 L0.000,323.249 Z"></path>
        </svg>
        <div class="row">
            <div class="col-md-6 col-lg ml-lg-5 order-2 pooster-text">


                <div class="header-text-center w-100 text-center">
                    <span >آمیزه‌ی هنر، خلاقیت و مهارت</span>
                    <h1> سنگ الماس</h1>
                </div>
                <div class="banner-text-item">
                    <ul class=" p-0 list-unstyled mb-20 text-right ">

                        <li>
                            <i class="las la-check-circle"></i>
                            اگه بار اوله این پیج رو می بینی، میتونی 20% تخفیف بگیری..

                        </li>

                        <li>
                            <i class="las la-check-circle"></i>
                            به ازای هر مشتری که ما رو بهش معرفی کنی 20% از سود فروش اون سنگ بهت تعلق میگیره..

                        </li>

                        <li>
                            <i class="las la-check-circle"></i>
                            یا میتونی تو قسمت فروش و بازاریابی باهامون همکاری کنی

                        </li>
                        <li class="link-takhfif-li">
                            <i class="las la-check-circle"></i>
                            برای دریافت تخفیف یا کسب اطلاعات بیشتر روی لینک زیر کلیک کن
                            <div class="text-center link-takhfif"><a href="{{route('home.work')}}" class="">
                                    دریافت کد تخفیف
                                </a></div>


                        </li>



                    </ul>

                </div>


            </div>
            <div class=" col-md-6 col-lg-auto order-1 order-md-3 ">
                <a class="pooster-img d-block">
                    <img src="{{asset('front-assets/img/14.jpg')}}" class="img-fluid" alt="سنگ مزار " >
                    <img src="{{asset('front-assets/img/14.jpg')}}" class="img-fluid" alt="سنگ مزار " >
                </a>


            </div>
        </div>

        <!--end pooster-->
    </section>
    <!--            end pooster-->
    </div>
    </div>
{{--slider--}}
    <div class="main">


        <!--            start slide-->
        <section class="carousel-slide">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="slide-back-svg">
                        <h3 class="text-header-carousel">گالری </h3>
                        <svg>
                            <path fill="#fff" id="down_bg_copy_2" data-name="down / bg copy 2" class="cls-1" d="M444.936,252.606c-148.312,0-305.161-29.63-444.936-80.214V0H1920V12S808.194,234.074,444.936,252.606Z"></path>
                        </svg>
                    </div>

                </div>
                <div class="col-12 carousel-slide1">

                    <div class="row  mt-0">


                        <div class="col-md-8 h-100">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @foreach($sliders as $index=> $slider)
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="{{$index}}" @if($index==0) class="{{'active'}}" @endif aria-current="true"
                                            aria-label="Slide {{$index+1}}"></button>
                                        @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach($sliders as $index => $slider)
                                    <div class="carousel-item @if($index==0) {{'active'}} @endif ">
                                        <img class="d-block" style="height: 100% !important;" src="{{ asset($slider->image) }}" alt="{{$slider->name}}">
                                        <div class="carousel-caption d-none d-md-block" style="background: rgba(41, 41, 41, 0.48)">
                                            <h5>{{$slider->name}}</h5>
                                            <p>{{$slider->body}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true">
                                             <i class="las la-angle-left"></i>

                                        </span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true">
                                             <i class="las la-angle-right"></i>
                                        </span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 h-100">
                            <div class="carosel-left">
                                <div class="row">

                                    <div class="col-6 col-md-12 pb-2 h-50">
                                        <img src="{{asset('front-assets/img/14.jpg')}}" alt="سنگ مزار">
                                    </div>
                                    <div class="col-6 col-md-12 pt-2 h-50">
                                        <img src="{{asset('front-assets/img/15.jpg')}}" alt="سنگ مزار">
                                    </div>



                                </div>
                            </div>


                        </div>
                    </div></div>

                <div class="d-grid gap-2 col-3 mx-auto">

                        <button class="btn btn-galery fw-bold btn-lg" type="button">
                            <a href="{{route('home.gallery')}}">
                            <i class="las la-angle-double-down"></i>برای دیدن گالری کلیک کنید
                            </a></button>


                </div>
            </div>
        </section>



        <!--            end slide-->


        <!--start six box-->
        <section class="six-box">

            <h3 class="text-six-box">شناخت انواع سنگ </h3>
            <div class="row">
                <div class="col-12 col-md-6  box-text-left">
                    <div class="box-text-left-item">

                        <h3>موارد زیر با قیمت سنگ قبر رابطه مستقیم دارد </h3>

                        <ul>
                            <li>
                                <h6>نوع سنگ قبر</h6>
                                <span>نوع سنگ قبر های متفاوت قیمتی متفاوت دارند ولی خرید سنگ قبر در تهران، به صورت تقریبی حدود قیمت بر اساس ترتیب نوشته شده کاهش می یابد.</span>
                            </li>
                            <li>
                                <h6>بهترین نوع سنگ قبر</h6>
                                <span>۱ -گرانیت نطنز اصفهان ۲- گرانیت سیمین ۳- گرانیت برزیلی ۴- انواع سنگ مرمر در چهار رنگ اصلی سبز و سفید و صورتی و کرم</span>
                            </li>
                            <li>
                                <h6>ضخامت سنگ قبر</h6>
                                <span>استاندارد ضخامت سنگ قبرها ۳cm و ۴cm و ۸cm می باشد. با این حال بارها پیش آمده که خرید سنگ قبر تهران با ضخامت دیگر برای مثال ۲۰cm و ۳۰ cm نیز سفارش داده شده است و بنابر سفارش قابل ساخت و ارائه است.</span>
                            </li>
                            <li>
                                <h6>ابعاد سنگ قبر</h6>
                                <span>سنگ قبر نیز ابعاد رایجی دارد ولی می توان با توجه به سفارش شما ساخته شود. ابعاد رایج سنگ قبر عبارتند از ۱- (۶۰*۸۰ cm) و ۲- (۶۰*۹۰ cm) و ۳- (۵۰*۱۰۰ cm)</span>
                            </li>
                            <li>
                                <h6>قرنیز های کنار سنگ قبر</h6>
                                <span>قرنیزها با توجه به نوع سنگ قبر و ارتفاع آن ساخته می شوند که با توجه به سنگ قبر مشخص می شود.</span>
                            </li>
                            <li>
                                <h6>سنگ ایستاده بالای مزار</h6>
                                <span>این سنگ نیز بستگی به نوع سنگ قبر انتخابی و ست شدن با آن دارد</span>
                            </li>
                            <li>
                                <h6>اشعار انتخابی و عکس و نوشته</h6>
                                <span>ین چنین موارد توسط دستگاه مخصوص بر روی سنگ حک می شود و با توجه به سایز و ساعت ماشین کاری دستگاه، مشخص می گردد. که در زمان مشاوره با ما کاملا برای شما توضیح داده خواهد شد.</span>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-12 col-md-6">
                    <div class="row Products">
                        <div class="col-md-4 col-sm-6 six-box-item">
                            <div class="six-box-item-inner">
                                <div class="inner-img">

                                    <img src="{{asset('front-assets/img/marmar.jpg')}}" alt="سنگ" class="img-responsive" data-bs-toggle="modal" data-bs-target="#mymodal">

                                </div>
                                <div class="inner-text">
                                    <h6 class="hidden-xs" style=" font-size:12px!important;">سنگ مرمر</h6>
                                    <div>
                                            <span>
                                           سنگ مرمر در رنگ بندی صورتی، نارنجی، سبز، کرم، قهوه ای و سفید موجود است. قیمت این سنگ‌ها باتوجه به درزها و رگه‌هایی که دارد تعیین می‌شود. مقاومت این سنگ دربرابر سرما و گرما بسیار بالاست و هرچه رگه‌های کمتر و سطح براق‌تری داشته‌باشد از مقاومت بالاتری نیز برخوردار است.
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 six-box-item">
                            <div class="six-box-item-inner">
                                <div class="inner-img">

                                    <img src="{{asset('front-assets/img/harat.jpg')}}" alt="سنگ" class="img-responsive" data-bs-toggle="modal" data-bs-target="#mymodal">

                                </div>
                                <div class="inner-text">
                                    <h6 class="hidden-xs" style=" font-size:12px!important;">سنگ هرات</h6>
                                    <div>
                                            <span>
                                                که با نام سنگ هرات نیز شناخته می‌شود، از تخته سنگ‌های وسیع افغانستان برداشت می‌شود. رنگ این سنگ‌ها سفید و دارای رگه‌هایی از سبز است. ضخامت این سنگ بین 3تا 20 سانتیمتر متغیر است.
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 six-box-item">
                            <div class="six-box-item-inner">
                                <div class="inner-img">

                                    <img src="{{asset('front-assets/img/nano.jpg')}}" alt="سنگ" class="img-responsive" data-bs-toggle="modal" data-bs-target="#mymodal">

                                </div>
                                <div class="inner-text">
                                    <h6 class="hidden-xs" style=" font-size:12px!important;">سنگ نانو </h6>
                                    <div>
                                               <span>
                                                   این نوع سنگ جزو سنگ‌های مصنوعی‌ست است که وزن آنرا بسیار کمتر از سنگ‌های طبیعی کرده و نصب آن‌را راحت‌تر می‌سازد. قیمت این سنگ نسبت به سنگ‌های طبیعی پایینتر است. <br> تنها ضخامت موجود ازین سنگ ضخامت 3 سانتیمتر است. و بدلیل جذب آب بسیار اندک، از استقامت بالا و رنگ ثابت‌تری برخوردار است.
                                               </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 six-box-item">
                            <div class="six-box-item-inner">
                                <div class="inner-img">

                                    <img src="{{asset('front-assets/img/گرانیت برزیل.jpg')}}" alt="سنگ" class="img-responsive" data-bs-toggle="modal" data-bs-target="#mymodal">

                                </div>
                                <div class="inner-text">
                                    <h6 class="hidden-xs" style=" font-size:12px!important;">گرانیت برزیلی </h6>
                                    <div>
                                             <span>
                                                 این نوع سنگ مزار برخلاف اسمش محصول کشور چین است. سطح این سنگ‌ها کاملا صاف و صیقلی‌ست.هم قابلیت تراشکاری بهتر و هم طول عمر بیشتری را تضمین می‌کند. تنوع ضخامت در این نوع سنگ بسیار بالاست. به طوریکه از ضخامت 3 تا 30 سانتیمتر را پوشش می‌دهد.
                                             </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 six-box-item">
                            <div class="six-box-item-inner">
                                <div class="inner-img">

                                    <img src="{{asset('front-assets/img/گرانیت نطنز.jpg')}}" alt="سنگ" class="img-responsive" data-bs-toggle="modal" data-bs-target="#mymodal">

                                </div>
                                <div class="inner-text">
                                    <h6 class="hidden-xs" style=" font-size:12px!important;">گرانیت نطنز</h6>
                                    <div>
                                               <span>
                                                   این نوع سنگ که تولید داخل است در دو رنگ طوسی و مشکی در بازار عرضه می‌شود و از لحاظ درخشندگی نسبت به سنگ برزیلی در درجه پایین‌تری قرار می‌گیرد. قرارگیری آن هم مثل اکثر سنگ‌هایی که دیده‌اید روی زمین است و ضخامت 3تا 30 سانتیمتر را نیز پوشش می‌دهد.
                                               </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 six-box-item">
                            <div class="six-box-item-inner">
                                <div class="inner-img">

                                    <img src="{{asset('front-assets/img/گرانیت تویسرکان.jpg')}}" alt="سنگ" class="img-responsive" data-bs-toggle="modal" data-bs-target="#mymodal">

                                </div>
                                <div class="inner-text">
                                    <h6 class="hidden-xs" style=" font-size:12px!important;">گرانیت تویسرکان</h6>
                                    <div>
                                                <span>
                                                    این سنگ به دلیل محدودیت در استخراج و عرضه کوپ، تا حدودی کمیاب است. این نوع سنگ دارای تراکم بسیار بالا و ساب‌پذیری فوق‌العاده است و مقاومت سایش و فشاری خوبی دارد. جذب آب آن نیز بسیار ناچیز است.
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 six-box-item">
                            <div class="six-box-item-inner">
                                <div class="inner-img">

                                    <img src="{{asset('front-assets/img/گرانیت سیمین.jpg')}}" alt="سنگ" class="img-responsive" data-bs-toggle="modal" data-bs-target="#mymodal">

                                </div>
                                <div class="inner-text">
                                    <h6 class="hidden-xs" style=" font-size:12px!important;">گرانیت سیمین</h6>
                                    <div>
                                                <span>
                                            سنگ قبرهای سیمین یکی دیگر از انواع گرانیتی‌ هستند که از مقاومت و استحکام بسیار بالایی در برابر تابش نور خورشید، شرایط مختلف آب و هوایی و غیره برخوردارند. از مهمترین مشخصه این سنگ می‌توان به داشتن رنگ دانه‌های مشکی و سفید اشاره کرد.
                                              </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 six-box-item">
                            <div class="six-box-item-inner">
                                <div class="inner-img">

                                    <img src="{{asset('front-assets/img/شبق.jpg')}}" alt="سنگ" class="img-responsive" data-bs-toggle="modal" data-bs-target="#mymodal">

                                </div>
                                <div class="inner-text">
                                    <h6 class="hidden-xs" style=" font-size:12px!important;">سنگ شبق</h6>
                                    <div>
                                                <span>
                                             رنگ این سنگ مشکی‌ست و به دلیل ظاهر برق و درخشانی که دارد با اقبال بیشتری از سوی مشتریان روبروست.. از لحاظ قیمت هم این سنگ جزو گرانترین سنگ‌های موجود در بازار است.
                                               </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 six-box-item">
                            <div class="six-box-item-inner">
                                <div class="inner-img">

                                    <img src="{{asset('front-assets/img/سنگ-کوارتزیت.jpg')}}" alt="سنگ" class="img-responsive" data-bs-toggle="modal" data-bs-target="#mymodal">

                                </div>
                                <div class="inner-text">
                                    <h6 class="hidden-xs" style=" font-size:12px!important;">سنگ کوارتزیت</h6>
                                    <div>
                                                <span>
                                            سنگ قبرهایی که از نوع کوارتزیت، گابرو، تراولتن و دیوریت هستند، جز انواع سنگ قبرهای ارزان قیمت محسوب می‌شوند. این نوع سنگ‌ها با کیفیت و دوام نسبتا مناسب مشتریان خود را دارند. قیمت این سنگ قبرها متفاوت است .
                                              </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>
        <!--end six box-->


        <!--start sher v ver-->
        <section class="sher">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="sher-caption">
                        <h5 class="pb-1">گلچین اشعار</h5>
                        <p class="pt-2 ">
                            اشعار انتخابی و عکس و نوشته
                            توسط دستگاه مخصوص بر روی سنگ حک می شود که در زمان مشاوره با ما کاملا برای شما توضیح داده خواهد شد.
                        </p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="sher-item ">
                        <div class="row align-items-center">
                            @foreach ($lyricCategories as $key=> $lyricCategory)
                                @if($lyricCategory->status==1)
                            <div class="col-md-3 col-6 ">

                                <img src="{{ asset($lyricCategory->image['indexArray']['small'] ) }}" alt="{{$lyricCategory->name}}">
                                <div class="sher-item1" >
                                    <div class="sher-item-text text-center" >
                                        <h4>
                                            {{$lyricCategory->name}}
                                        </h4>
                                    </div>

                                </div>
                                <div class="d-md-block gap-2 btn-more text-center">
                                    <a href="{{route('home.category',$lyricCategory->id)}}">
                                        <button class="btn fw-bold " type="button">دیدن اشعار..</button>
                                    </a>

                                </div>
                            </div>
                                @endif
                          @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--start sher v ver-->



    </div>

@endsection

@section('script')
    <script>
        $('.six-box-item-inner').click(function (){

            var z=$(this).find(".inner-img img").attr('src');
            var x=$(this).find('.inner-text div').html();
            $('.modal-img img').attr('src',z);
            $('.modal-caption h4').html(x);
        });

        setTimeout(function (){
            $('.header-text-center').animate( {top : '0'},2000)
        },500)
        setTimeout(function (){
            $('.banner-text-item').animate( {top : '0'},2000)
        },1000)

    </script>



@endsection
