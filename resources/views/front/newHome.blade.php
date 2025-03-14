@extends('newlayout')
@section('content')
<main>
    <div class="welcome">
        <div class="welcome-title">
            <h2>Fırat Üniversitesi Video Kanalına </h2>
            <h1>Hoş Geldiniz</h1>
        </div>
        <div class="welcome-logo">
            <img src="{{asset('./images/firatlogo404.png')}}" alt="">
        </div>
    </div>

    <div class="container">

        @if(isset($videos)&&!is_null($videos))
            <div class="videos-inner">
                @foreach($videos as $v)
                    <a href="{{route('detail',$v->id)}}" style="text-decoration: none; color: #606060" class="video-card">


                        <div class="video-card-top">
                            <div class="play-button">
                                <img src="{{asset('./images/playicon.png')}}" alt="">
                            </div>

                            <video id="myVideo" class="videos" controls poster="{{$v->image}}" autoplay="autoplay" muted>
                            </video>
                        </div>
                        <div class="video-card-body">
                            <h5 class="card-title">{{$v->title}}</h5>
                            <p>{{$v->description}}</p>
                        </div>
                    </a>
                @endforeach

            </div>
        @endif


    </div>

</main>
<script>
    var vid = document.getElementById("myVideo");

    function playVid() {
        vid.play();
    }

    function pauseVid() {
        vid.pause();
    }
</script>

@endsection

