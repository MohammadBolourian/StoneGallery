<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            <a href="{{ route('admin.gallery.index') }}"  class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>گالری</span>
            </a>

            <a href="{{ route('admin.slider.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اسلایدر</span>
            </a>

            <a href="{{ route('admin.lyrics.category.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی اشعار</span>
            </a>
            <a href="{{ route('admin.lyrics.post.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اشعار</span>
            </a>

            <a href="{{ route('admin.blog.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span> مقالات</span>
            </a>
            <a href="{{ route('admin.user.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>مدیریت</span>
            </a>
            <a href="{{route('auth.logout')}}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>خروج از پنل</span>
            </a>



        </section>
    </section>
</aside>
