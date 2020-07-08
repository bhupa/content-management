@extends('layouts.app')
@section('title', $content->title)
@section('style_css')
    <style >
        .site-blocks-cover, .site-blocks-cover .row { min-height:250px !important; height:auto !important; padding-top: 40px;}
        .site-blocks-cover h1 {font-size: 2rem}
    </style>
@endsection
@section('header_js')
@endsection
@section('main')


    @if($contentbanner['image']  !=='')
        <div class="site-blocks-cover overlay" style="background-image: url('{{asset('storage/'.$contentbanner['image'])}}')" data-aos="fade" data-stellar-background-ratio="0.5" >
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center" data-aos="fade">

                        <h1 class="">Content </h1>
                        <span class="caption mb-3">{{$content->title}}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- .custom-header -->
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-7  col-md-8 col-lg-8 ">
                    <div class="media-with-text">
                        <div class="img-border-sm mb-4">
                            <a href="javascript:void(0)" class="popup-vimeo image-play">
                                    @if(file_exists('storage/'.$content->image) && $content->image != '')<div class="contentimg">
                                        <img src="{{asset('storage/'.$content->image)}}" alt="" data-action="zoom" class="img-fluid"></div>
                                    @endif
                            </a>
                        </div>
                        <p> {!! $content->description !!}</p>

                    </div>
                </div>

                <div class="col-sm-5  col-md-4 col-lg-4">

                    <div class="other">
                        <ul>
                            @foreach($roomlists as $roomlist)
                                <li>
                                    <div class="row other_row">
                                        <div class="col-md-4 col-sm-4 col-xs-4 other_col">
                                            <a href="{{route('room.show',[$roomlist->slug])}}" >
                                                @if(file_exists('storage/'.$roomlist->cover_image) && $roomlist->cover_image !== '')
                                                    <img src="{{asset('storage/'.$roomlist->cover_image)}}" alt="{{$roomlist->title}}" class="img-fluid">
                                                @endif
                                            </a></div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 other_col">
                                            <div class="media-with-text">
                                                <h2 class="heading mb-0"><a href="{{route('room.show',[$roomlist->slug])}}">{!! str_limit($roomlist->name,'50','...') !!}</a></h2>
                                                <span class="mb-3 d-block post-date">{{$roomlist->price}} / per night</span>
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
    <!-- .site-header -->


@endsection

@section('scripts')


    <script type="text/javascript">

    </script>
@endsection