@extends('layouts.app')
@section('title', $event->title)
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
                        <span class="caption mb-3">{{$event['title']}}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-7  col-md-8 col-lg-8 ">
                    <div class="media-with-text">
                        <div class="img-border-sm mb-4">
                            <a href="javascript:void(0)" class="image-play">
                                @if(file_exists('storage/'.$event['image']) && $event['image'] !=='')
                                <img src="{{asset('storage/'.$event['image'])}}" alt="{{$event['image']}}" class="img-fluid">
                                    @endif
                            </a>
                        </div>
        <p>{!! $event['description'] !!}</p>
                    </div>
                </div>

                <div class="col-sm-5  col-md-4 col-lg-4">

                    <div class="other">
                        <ul>
                            @foreach($events as $evnt)
                            <li>
                                <div class="row other_row">
                                    <div class="col-md-4 col-sm-4 col-xs-4 other_col">
                                        <a href="{{route('event.show',[$evnt->slug])}}" >
                                            @if(file_exists('storage/'.$evnt->image) && $evnt->image !==  '')
                                            <img src="{{asset('storage/'.$evnt->image)}}" alt="{{$evnt->title}}" class="img-fluid">
                                                @endif
                                        </a></div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 other_col">
                                        <div class="media-with-text">
                                            <h2 class="heading mb-0"><a href="{{route('event.show',[$evnt->slug])}}">{{ str_limit($evnt->title,'50','....')}}</a></h2>
                                            <span class="mb-3 d-block post-date">{{ \Carbon\Carbon::parse($evnt->created_at)->toFormattedDateString() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                                @endforeach






                        </ul>
                        <div class="clear"></div>
                    </div>

                </div>




            </div>



        </div>
    </div>

@endsection