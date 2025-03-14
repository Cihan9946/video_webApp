@extends("layout")
@section("content")
    <style>
        .card {
            min-height: 315px;
        }
        .videos-inner{
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .videos-inner .video-card{
            width: calc((100% - 60px) / 3);
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 15px 1px #00000012;
            text-decoration: none !important;
            transition: 400ms all;
            position: relative;
        }
        .videos-inner .video-card:hover{
            margin-top: -10px;

        }
        .videos-inner .video-card .video-card-top{
            width: 100%;
            overflow: hidden;
        }
        .videos-inner .video-card .video-card-top video{
            width: 100%;
            object-fit: cover;
            height: 180px;
        }
        .videos-inner .video-card .video-card-body{
            padding: 20px 15px;
        }
        .videos-inner .video-card .video-card-body h5{

        }
        .videos-inner .video-card .video-card-body p{

        }
        @media  only screen and (max-width: 992px) {
            .videos-inner .video-card {
                width: calc((100% - 40px) / 2);
            }

        }
        @media  only screen and (max-width: 768px) {
            .videos-inner .video-card {
                width: 100%
            }

        }
    </style>
    <main style="    background-image: url(https://img.freepik.com/free-vector/white-abstract-wallpaper_23-2148830028.jpg?t=st=1658410749~exp=1658411349~hmac=3cdc5c5…&w=1480);
    background-size: cover;
">
    <div class="container">
        <div class="row mb-4">
            <div class="img col-12 " style="    display: flex;
    margin-top: 25px;
    justify-content: center;">
                <picture>
                    <img style="object-position: top;
    object-fit: cover;
    width: 180px;
    height: 180px;
    position: relative;" src="{{asset('images/firatvideoimg.png')}}" alt="">
                </picture>
                <div class="videos-title mb-5 ml-4 " style=" margin-top: 40px">
                    <h2 class="m-0 " >Fırat Video Kanalına <p style="font-size: 40px"><i> Hoşgeldiniz</i> </p></h2>
                </div>
            </div>


        </div>

        @if(isset($videos)&&!is_null($videos))
                <div class="videos-inner">
                    @foreach($videos as $v)
                        <a href="{{route('detail',$v->id)}}" class="video-card">
                            <div class="video-card-top">
                                <video controls poster="{{$v->image}}" autoplay="autoplay">
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

    {{-- <style>
         .card{
             min-height: 315px;
         }
     </style>
     <div class="container">
         <h1>Videolar</h1>
         <div class="row mb-3">
             <div class=" col-sm-6 col-md-4 ">
                 <a href="">
                     <div class="card mb-3" >
                         <div class="embed-responsive embed-responsive-21by9">
                             <video controls poster="" autoplay="autoplay" >
                                 <source src="" type="video/mp4">
                             </video>
                         </div>
                         <div class="card-body">
                             @if($videos != null)
                                 @foreach($videos as $v)
                                     <h5 class="card-title">{{$v->title}}</h5>
                                     <p>{{$v->description}}</p>
                                 @endforeach
                             @endif
                         </div>
                     </div>
                 </a>
             </div>
         </div>
     </div>--}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
     -->
@endsection
