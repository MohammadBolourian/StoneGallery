<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In Form</title>
    <link rel="stylesheet" href="{{asset('admin-assets/css/bootstrap/bootstrap.min.css')}}">
   <style>
       html {
           height: 100%;
           background-image: url({{asset('login-image/background.jpg')}});
           background-size: 100% 100%;
           background-repeat: no-repeat;
       }

       body {
           background: transparent !important;
       }

       body, html {
           margin: 0;
           padding: 0;
           direction: rtl;
       }

       * {
           box-sizing: border-box;
       }

       ul, li {
           margin: 0;
           padding: 0;
           list-style: none;
       }

       a {
           text-decoration: none;
           color: black;
       }

       .clear {
           clear: both;
           float: none !important;
       }

       .flex {
           display: flex;
           align-items: center;
           justify-content: center;
       }

       .clearfix:before,
       .clearfix:after {
           content: " ";
           display: table;
       }

       .clearfix:after {
           clear: both;
       }

       .container .row {
           margin: auto;
           margin-top: 15%;
           width: 70%;
       }

       .img-login {
           background-image: url({{asset('login-image/desk.jpg')}});
           object-fit: cover;
           background-size: 100% 100%;
           height: 350px;
       }

       .btn {
           font-size: 20px;
       }

       .btn:hover {
           background-color: black;
           color: white;
       }

       @media (max-width: 768px) {
           .img-login {
               display: none;
           }

           .login-form {
               padding-bottom: 20px;
           }
       }
   </style>
</head>

<body>
<div class="container" >

    <div class="row">
        <div class=" col-md-6 img-login " style="height: auto">

        </div>
        <div class=" col-md-6 bg-light pt-2 login-form text-center">
            <h1 > ورود ادمین</h1>
            <form class="mt-5" action="{{route('auth.check')}}" method="post">
                @csrf
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="نام کاربری" value="{{ old('email') }}" required>
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="کلمه عبور" required>
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
                <div class="form-group col-md-8 offset-md-4 mb-3">
                    <div name="g-recaptcha-response" class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
                    <span class="text-danger">@error('g-recaptcha-response'){{ $message }} @enderror</span>
                </div>
                <div class="d-grid mb-5 mt-3">
                    <button type="submit" class="btn border-dark fw-bold">ورود</button>
                </div>

            </form>
        </div>
    </div>

</div>

</body>
<script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
</html>
