@extends('layouts.app')
@section('title', config('app.name') )
@section('style_css')

@endsection
@section('header_js')
@endsection
@section('main')
    <div id="banner-carsoule" class="owl-carousel owl-theme ">

        @foreach($banners as $banner)
         <section class="home-page-banner-area d-flex text-center" style="min-height:570px; background:linear-gradient(to right, rgba(4, 9, 30, 0.8), rgba(4, 9, 30, 0.8)), url('{{asset('storage/'.$banner->image)}}')">
        <div class="container align-self-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_content">
                        <h1>{{$banner->title}}  </h1>

                        {!! str_limit($banner->short_description,'200','.....') !!} <br>
                        <a href="{{route('banner.show',[$banner->slug])}}" class="btn_hover btn_hover_two">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
       @endforeach
    </div>

    <section class="home-about-us-section">
        <div class="container">

                @if(!empty($about))
            <div class="row">
                <div class="col-md-6">
                    <div class="home-about-image-wrapper">

                        @if(file_exists('storage/'.$about->image) && $about->image != '')
                            <a href="{{route('content.show',[$about->slug])}}">
                                <img src="{{asset('storage/'.$about->image)}}" alt="{{$about->title}}"  class="event-image">
                            </a>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="home-about-content">
                        <h2>About Us</h2>

                       {!! $about->short_description !!}


                        <a href="{{route('content.show',[$about->slug])}}">More About Us</a>
                    </div>
                </div>
            </div>
                @endif
        </div>
    </section>
    <section class="features_area mt-6">
        <div class="row m0">


            <div class="col-md-4 features_item">
                @foreach($contents as $content)
                @if($content->slug == 'our-aims')
                <h3>{{$content->title}}</h3>

                {!! str_limit($content->short_description,'120','.....') !!}
                <a href="{{route('content.show',[$content->slug])}}" class="btn_hover view_btn">View Details</a>
                    @endif
                    @endforeach
            </div>
{{--            <div class="col-md-4 features_item">--}}
{{--                @foreach($contents as $content)--}}
{{--                @if($content->slug == 'our-goals')--}}
{{--                    <h3>{{$content->title}}</h3>--}}

{{--                    {!! str_limit($content->short_description,'120','.....') !!}--}}
{{--                    <a href="{{route('content.show',[$content->slug])}}" class="btn_hover view_btn">View Details</a>--}}
{{--                @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
            <div class="col-md-4 features_item">
                @foreach($contents as $content)
                @if($content->slug == 'our-vision')
                    <h3>{{$content->title}}</h3>

                    {!! str_limit($content->short_description,'120','.....') !!}
                    <a href="{{route('content.show',[$content->slug])}}" class="btn_hover view_btn">View Details</a>
                @endif
                @endforeach
            </div>
            <div class="col-md-4 features_item">
                @foreach($contents as $content)
                @if($content->slug == 'our-values')
                    <h3>{{$content->title}}</h3>

                    {!! str_limit($content->short_description,'120','.....') !!}
                    <a href="{{route('content.show',[$content->slug])}}" class="btn_hover view_btn">View Details</a>
                @endif
                @endforeach
            </div>

        </div>
    </section>
    <section class="message team-section home-team-section" >
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Executive Committee</h2>
                </div>
            </div>


            <div class="row justify-content-center">

                @foreach($members as $team)
                    <div class="col-lg-4 col-md-6">

                        <div class="team-top">
                            <div class="team-wrapper">
                                @if(file_exists('storage/'.$team->image) && $team->image != '')
                                    <img src="{{asset('storage/'.$team->image)}}" alt="{{$team->name}}" class="team-image">
                                @endif

                                <div class="content-details">
                                    <h4>{{$team->name}}</h4>
                                    <h5>{{$team->position->name}}</h5>
                                    <p>{{$team->address}}</p>
                                </div>

                                <ul class="team-social-link">
                                    <li>
                                        <a href="@if($team->facebook !== '') {{$team->facebook}} @else # @endif"> <i class="fa fa-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="@if($team->linkedin !== '') {{$team->linkedin}} @else # @endif"> <i class="fa fa-linkedin"></i> </a>
                                    </li>
                                    <li>
                                        <a href="@if($team->twitter !== '') {{$team->twitter}} @else # @endif"> <i class="fa fa-twitter"></i> </a>
                                    </li>
                                </ul>
                            </div>




                        </div>
                        {{--<div class="single_volenteer">--}}
                        {{--<div class="volenteer_thumb">--}}
                        {{--@if(file_exists('storage/'.$team->image) && $team->image != '')--}}
                        {{--<img src="{{asset('storage/'.$team->image)}}" alt="{{$team->name}}">--}}
                        {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="voolenteer_info d-flex align-items-end">--}}
                        {{--<div class="social_links">--}}
                        {{--<ul>--}}
                        {{--<li>--}}
                        {{--<a href="@if($team->facebook !== '') {{$team->facebook}} @else # @endif"> <i class="fa fa-facebook"></i> </a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="@if($team->linkedin !== '') {{$team->linkedin}} @else # @endif"> <i class="fa fa-linkedin"></i> </a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="@if($team->twitter !== '') {{$team->twitter}} @else # @endif"> <i class="fa fa-twitter"></i> </a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="info_inner">--}}
                        {{--<h4>{{$team->name}}</h4>--}}
                        {{--<h5>{{$team->position->name}}</h5>--}}
                        {{--<p>{{$team->address}}</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    <section class="home-blog home-team-section"  id="our-events">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Our Events</h2>
                </div>
            </div>
            <div class="row">
                @foreach($events as $event)
                    <div class="col-12 col-md-6" id="event-height-div">
                        <div class="event">
                            <div class="event-img">
                                @if(file_exists('storage/'.$event->image) && $event->image != '')
                                    <a href="{{route('event.show',[$event->slug])}}">
                                        <img src="{{asset('storage/'.$event->image)}}" alt="{{$event->title}}"  class="event-image">
                                    </a>
                                @endif
                            </div>
                            <div class="event-content">
                                <h3><a href="{{route('event.show',[$event->slug])}}">{{ str_limit($event->title,'50','....')}}</a></h3>
                                <ul class="event-meta">
                                    <li><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</li>
                                    <li><i class="fa fa-map-marker"></i> {{$event->location}}</li>
                                </ul>
                                <p>
                                    {!! str_limit($event->short_description,'150','.....') !!}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.--}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </section>

    <section class="home-blog gallery">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Gallery</h2>
                </div>
            </div>
            <div class="row">
                <div class="row">

                    @foreach($galleries as   $gallery)
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        @if(file_exists('storage/'.$gallery->image) && $gallery->image != '')
                        <a class="thumbnail" href="{{route('gallery.show',[$gallery->slug])}}">
                            <img class="img-thumbnail"
                                 src="{{asset('storage/'.$gallery->image)}}"
                                 alt="{{$gallery->title}}">
                            <h3 class="gallery-title">{{ str_limit($gallery->title,'100','.....')}}</h3>
                        </a>

                            @endif
                    </div>
                    @endforeach


                </div>


                <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                </button>

                                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-blog  home-blog-bottom">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Our Blogs</h2>
                </div>
            </div>
            <div class="row">

                @foreach($blogs as $blog)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card fundraise-item" >
                            <a href="{{route('blogs.show',[$blog->slug])}}"  >
                                @if(file_exists('storage/'.$blog->image) && $blog->image != '')
                                    <img class="card-img-top"  src="{{asset('storage/'.$blog->image)}}" alt="{{$blog->title}}">
                                @endif
                            </a>
                            <div class="card-body">
                                <h3 class="card-title"><a href="#">{{$blog->title}}</a></h3>
                                <p class="card-text">{!!   str_limit($blog->short_description,'100','.....') !!}</p>
                                <span class="donation-time mb-3 d-block">{{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}</span>
                                <div class="progress custom-progress-success">
                                    <p>{{$blog->short_description}}</p>
                                </div>
                                <a href="{{route('blogs.show',[$blog->slug])}}" class="btn_hover view-more-btn">
                                    More Detials
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>

    </section>

@endsection

@section('script')

@endsection
