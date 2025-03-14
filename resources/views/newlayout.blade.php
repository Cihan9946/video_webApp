<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css"/>
    <link rel="icon" href="https://www.firat.edu.tr/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.css')}}"/>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <script src="{{asset('jquery/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('jquery/wow.min.js')}}"></script>

    <title>Fırat Video</title>


</head>
<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
<body>


<div class="sidemenu">
    <div class="sideMenu-logo">
        <div class="ucgen">
            <img src="{{asset('./images/ucgen.png')}}" alt="">
        </div>
        <a href="https://video.firat.edu.tr/" style="text-decoration: none">
        <div class="sideMenu-title ml-3 ">
            <h2 style="margin-top: -5px;    margin-left: 15px;color: #565656">Fırat Video</h2>
        </div>
        </a>
        <div class="sideButton">
            <div class="mobil-button">
                <button class="navbar-toggler open collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>


    <div class="menu">

        <ul class="menu-list">
            <li>
                <a href="{{route('video.newHome')}}">
                    <i class="fa-solid fa-house"></i>
                    <span>Ana Sayfa</span>
                </a>
            </li>
            <li>
                <a href="{{route('mostViewed')}}">
                    <i class="fa-solid fa-up-to-line"></i>
                    <span>En Çok İzlenen Videolar</span>
                </a>
            </li>
            <li>
                <a href="{{route('lastAdded')}}">
                    <i class="fa-solid fa-forward-fast"></i>
                    <span>En Son Eklenen Videolar</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="footer" style="height: 50px;     display: flex;
       padding: 20px 0 0;
    margin-top: 10px;
    color: #797979;
    align-items: center;
    justify-content: center;">
        <p>Tüm Hakları Saklıdır© 2022 | <a href="http://ddyo.firat.edu.tr/" target="_blank"
                                           style="color: #131313; text-decoration: none; margin:0;">
                Dijital Dönüşüm ve Yazılım Ofisi </a></p>
    </div>

</div>


@yield("content")
<script>
    function menuClose() {
        $("body").removeClass("closed");
        $(".navbar-toggler").addClass("open");
        $(".navbar-toggler").removeClass("close");
    }

    function menuOpen() {
        $("body").addClass("closed");
        $(".navbar-toggler").removeClass("open");
        $(".navbar-toggler").addClass("close");
    }
</script>

<script>
    $(".mobil-button").click(function () {

        if ($(".navbar-toggler.collapsed").hasClass("close")) {
            menuClose()
        } else {
            menuOpen()
        }
    })
</script>
<script>
    $(window).resize(function () {
        if ($(window).width() < 998) {
            menuOpen()
        } else {
            menuClose()
        }
    })
    if ($(window).width() < 998) {
        menuOpen()
    } else {
        menuClose()
    }
</script>

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
