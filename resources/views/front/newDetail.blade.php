@extends('newlayout')
@section('content')
  <main>
      <div class="container videodetail" style="
  ">
          @if($video != null)
              <div class="row">
                  <div class="col-12">
                      <div class="card mt-5" >
                          <div class="embed-responsive embed-responsive-21by9">
                              <video  style="width: 100%;height: 100%;" autoplay id="myVideo" poster="{{$video->image}}"  controls  >
                                  <source  src="{{asset('videos/'.$video->video_url)}}" type="video/mp4">
                              </video>

                          </div>

                          <div class="card-body">

                              <h5 class="card-title">{{$video->title}}</h5>
                              <p>{{$video->description}}</p>

                          </div>
                      </div>
                  </div>

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
