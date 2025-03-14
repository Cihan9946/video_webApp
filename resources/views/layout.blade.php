<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css"/>
    <link rel="icon" href="https://www.firat.edu.tr/favicon.ico" type="image/x-icon">

    <title>Fırat Video</title>


</head>
<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
<body>
<div class="header">

    <div class="logo">
        <div class="logo-img">
            <a href="https://www.firat.edu.tr/tr" target="_blank">
                <img src="{{asset('./images/firatlogo404.png')}}" alt="">

            </a>
        </div>

    </div>
    <div style="display: flex;margin: auto">
        <div class="video-logo">
            <a href="{{route('home')}}">
                <img src="{{asset('./images/firatvideo.png')}}" alt="">
            </a>
        </div>
        <div class="header-title" style="    display: flex;
    align-items: center;">
        </div>
    </div>

    {{--<div class="dropdown">
        <button class="btn dropdown-toggle" style="background-color: #D82825; color:white; margin-left: 30px;"
                type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategoriler
        </button>
        <div class="dropdown-menu" style="margin-left:-97px" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Mühendislik Fakültesi</a>
            <a class="dropdown-item" href="#">Tıp Fakültesi</a>
            <a class="dropdown-item" href="#">Sağlık Bilimleri Fakültesi</a>
        </div>
    </div>--}}
</div>


@yield("content")
<div class="footer" style="height: 50px; background-color: #D82825;    display: flex;
       padding: 20px 0 0;
    margin-top: 10px;
    color: white;
    align-items: center;
    justify-content: center;">
    <p>Tüm Hakları Saklıdır© 2022 | <a href="http://ddyo.firat.edu.tr/" target="_blank" style="color: white; margin:0;">
            Dijital Dönüşüm ve Yazılım Ofisi </a></p>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
