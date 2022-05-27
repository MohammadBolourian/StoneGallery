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

