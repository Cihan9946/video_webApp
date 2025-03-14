@extends('newlayout')
@section('content')
    <main>
        <div class="input">

        </div>

        <div class="welcome">
            <div class="welcome-title">
                <h2>En Çok İzlenen Videolar </h2>
            </div>
            <div class="welcome-logo">
                <img src="{{asset('./images/firatlogo404.png')}}" alt="">
            </div>
        </div>

        <div class="container">
            @if(isset($videos)&&!is_null($videos))
                <div class="videos-inner">
                    @foreach($videos as $v)
                        <a href="{{route('detail',$v->id)}}" class="video-card">
                            <div class="video-card-top">
                                <div class="play-button">
                                    <img src="{{asset('./images/playicon.png')}}" alt="">
                                </div>
                                <video controls poster="{{$v->image}}" autoplay="autoplay">
                                </video>
                            </div>
                            <div class="video-card-body">
                                <h5 style="color: #5e5e5e" class="card-title">{{$v->title}}</h5>
                                <p style="color: #5e5e5e">{{$v->description}}</p>
                            </div>
                        </a>
                    @endforeach

                </div>
            @endif


        </div>

    </main>
@endsection
