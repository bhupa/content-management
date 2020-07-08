@extends('layouts.app')
@section('title', 'Event')
@section('style_css')
    <style >
        .site-blocks-cover, .site-blocks-cover .row { min-height:250px !important; height:auto !important; padding-top: 40px;}
        .site-blocks-cover h1 {font-size: 2rem}
    </style>
@endsection
@section('header_js')
    <script type="text/javascript">

        $('div.alert').delay(3000).slideUp(300);


    </script>
@endsection
@section('main')
    @if($contentbanner['image']  !=='')
        <div class="site-blocks-cover overlay" style="background-image: url('{{asset('storage/'.$contentbanner['image'])}}')" data-aos="fade" data-stellar-background-ratio="0.5" >
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center" data-aos="fade">

                        <h1 class="">Event</h1>
                        <span class="caption mb-3">Event List</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="site-section">
        <div class="container">
            <div class="row">
                @foreach($events as $event)
                    <div class="col-md-6 col-lg-4 mb-5">
                    <div class="media-with-text">
                        <div class="img-border-sm mb-4">
                            <a href="{{route('event.show',[$event->slug])}}" class=" image-play">
                                @if(file_exists('storage/'.$event->image) && $event->image !=='')
                                <img src="{{asset('storage/'.$event->image)}}" alt="{{$event->title}}" class="img-fluid">
                                    @endif
                            </a>
                        </div>
                        <h2 class="heading mb-0"><a href="{{route('event.show',[$event->slug])}}">{!! str_limit($event->title,'35','.....') !!}</a></h2>
                        <span class="mb-3 d-block post-date">{{ \Carbon\Carbon::parse($event->created_at)->toFormattedDateString() }}</span>
                        <p>{!! str_limit($event->short_description,'150','.....')!!}</p>
                    </div>
                </div>
                @endforeach

            </div>



        </div>
    </div>


@endsection