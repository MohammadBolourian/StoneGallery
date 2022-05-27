<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.layout.head-tag")
    @yield("head-tag")
</head>

<body dir="rtl">
    @include("admin.layout.header")
<section class="body-container">
    @include("admin.layout.sidebar")
    <section id="main-body" class="main-body">
        @yield("contain")
    </section>
</section>
    @include("admin.layout.scripts")
    @yield("script")

    <section class="toast-wrapper flex-row-reverse">
        @include('admin.alerts.toast.success')
        @include('admin.alerts.toast.error')
    </section>
    @include('admin.alerts.sweetalert.success')
    @include('admin.alerts.sweetalert.error')
</body>
</html>
