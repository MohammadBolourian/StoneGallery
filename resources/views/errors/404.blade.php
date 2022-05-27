<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Not Found</title>
</head>
<script src="{{asset('admin-assets/js/jquery-3.5.1.min.js')}}"></script>
<style>
    html {
        background-color: transparent;
        background-image: linear-gradient(130deg, #ea698b 0%, #6247aa 100%);
        background-size: 100% 100%;
        height: 100%;
    }
    body {
        background: transparent;
    }

    body, html {
        font-family: BYekan;
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

    @keyframes op {
        100% {
            opacity: 0;
        }
    }
    @keyframes rocket {
        from {
            transform: translate(0, 0);
        }
        to {
            transform: translate(1200px, -600px);
        }
    }
    @keyframes scale-star {
        from {
            transform: scale(1, 1);
        }
        to {
            transform: scale(1.2, 1.2);
        }
    }
    @keyframes spin-earth {
        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
            transition: transform 20s;
        }
    }
    @keyframes move-astronaut {
        100% {
            -webkit-transform: translate(-160px, -160px);
            transform: translate(-160px, -160px);
        }
    }
    @keyframes rotate-astronaut {
        100% {
            -webkit-transform: rotate(-720deg);
            transform: rotate(-720deg);
        }
    }
    .contentEror {
        display: flex;
        margin-top: 15%;
        flex-direction: column;
        align-items: center;
    }
    .contentEror img {
        width: 350px;
    }
    .contentEror .btn {
        border-radius: 20px;
        color: white;
        margin-top: 10px;
        border: 1px solid #ff8e40;
        transition: all 0.3s ease-in;

        /* display: inline-block; */
        font-weight: 400;
        line-height: 1.5;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        background-color: transparent;

        padding: 0.375rem 0.75rem;
        font-size: 1rem;

    }
    .contentEror .btn:hover {
        background-color: #ff8e40;
        transform: scale(1.05);
        box-shadow: 0px 20px 20px rgba(0, 0, 0, 0.1);
    }

    .objects .object_rocket {
        z-index: 103;
        width: 100px;
        position: absolute;
        top: 70%;
        right: 30%;
        animation: rocket 200s linear infinite both running;
    }
    .objects .object_earth {
        width: 150px;
        position: absolute;
        top: 20%;
        right: 10%;
        animation: spin-earth 100s infinite linear both;
        z-index: 102;
    }
    .objects .object_moon {
        width: 100px;
        position: absolute;
        top: 12%;
        right: 25%;
        z-index: 101;
    }
    .objects .object_astronaut {
        animation: rotate-astronaut 200s infinite linear both alternate;
    }
    .objects .box_astronaut {
        width: 170px;
        z-index: 100;
        position: absolute;
        top: 60%;
        left: 20%;
        animation: move-astronaut 50s infinite linear both alternate;
    }

    .star {
        background: white;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        position: absolute;
        animation: op 1s linear;
        animation-fill-mode: forwards;
        opacity: 0.7;
    }

    .star-box {
        width: 100%;
        height: 100%;
    }
</style>
<body>
<!-- start content -->
<div class="contentEror">
    <img src="{{asset('admin-assets/images/404.png')}}" alt="404">
    <a href="{{route('home')}}"><button class="btn">بازگشت به صفحه اصلی</button></a>
</div>
<div class="objects">
    <img class="object_rocket" src="{{asset('admin-assets/images/rocket.svg')}}" >
    <div class="earth-moon">
        <img class="object_earth" src="{{asset('admin-assets/images/earth.svg')}}" >
        <img class="object_moon" src="{{asset('admin-assets/images/moon.svg')}}" >
    </div>
    <div class="box_astronaut">
        <img class="object_astronaut" src="{{asset('admin-assets/images/astronaut.svg')}}" >
    </div>
    <div class="star-box"></div>
</div>
</body>
</html>
<script>
    setInterval(function (){
        var x=Math.round(Math.random()*100);
        var l=Math.round(Math.random()*100);
        var t=Math.round(Math.random()*90);
        var d=Math.round(Math.random()*4)+1;
        var star="<div class='star' style='left: "+l+"%;top:"+t+"%; animation-duration:"+d+"s'></div>"
        document.getElementsByClassName('star-box').item(0).innerHTML+=star;
    },100)
    setInterval(function (){
        var s=document.getElementsByClassName('star-box').item(0).getElementsByTagName('div');
        for (var i=0; i<s.length;i++){
            if(s[i].style.opacity==0){
                s[i].remove();

            }
        }
    },2000)
</script>
