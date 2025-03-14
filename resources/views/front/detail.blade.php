@extends('layout')
@section('content')
   {{-- <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-5" >
                    <div class="embed-responsive embed-responsive-21by9">
                        <video  id="video" poster="{{asset('images/'.$image ?? '')}}"  controls  >
                            <source  src="{{asset('/videos/'.$video)}}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>

        </div>
    </div>--}}

    <div class="container">
        @if($video != null)
                <div class="row">
            <div class="col-12">
                <div class="card mt-5" >
                    <div class="embed-responsive embed-responsive-21by9">
                        <video autoplay id="video" poster="{{$video->image}}"  controls  >
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

@endsection
