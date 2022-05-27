<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth">
<head>
    @include("front.layout.head-tag")
    @yield("head-tag")
</head>

<body dir="rtl" style="width: 99%">

<section class="body-container">
    <section id="main-body" class="main-body">
        @yield("contain")
    </section>
</section>
    @include("front.layout.tellfix")
    @include("front.layout.footer")
    @include("front.layout.scripts")
    @yield("script")
</body>
</html>
