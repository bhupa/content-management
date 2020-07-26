@extends('layouts.app')
@section('title', 'Event')

@section('header_js')
@endsection
@section('main')

    <div id="custom-header"
         @if(file_exists('storage/'.$setting->value) && $setting->value != '')
         style="background-image: url('{{asset('storage/'.$setting->value)}}')"
            @endif
    >
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title">Events</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="{{route('home')}}" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Events</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->
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
                    <div class="pagination-wrapper">
                        <div class="more-wrapper">
                            <nav class="navigation pagination"> {{$events->links('vendor.pagination.custom')}}
                                {{--
                                <div class="nav-links">--}}
                                {{--<span class="page-numbers current">1</span>--}}
                                {{--<a class="page-numbers" href="#">2</a>--}}
                                {{--<a class="page-numbers" href="#">3</a>--}}
                                {{--<a class="next page-numbers" href="#">Next »</a>--}}
                                {{--</div>
                              <!-- .nav-links -->--}} </nav>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

            </div>
        </div>

    </section>
@include('team.list')
    @include('blog.list')

@endsection
