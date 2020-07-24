@extends('layouts.app')
@section('title', $event->title)
@section('facebook_meta')

    <meta property="og:url"           content="{{route('event.show',[$event->slug])}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $event->title}}" />
    <meta property="og:description"   content="{{ $event->short_description}}" />
    @if(file_exists('storage/'.$event->image) && $event->image != '')
        <meta property="og:image"         content="{{asset('storage/'.$event->image)}}" />
    @else
        <meta property="og:image"         content="https://dummyimage.com/600x340/ed3833/1e1edc.png&text=Khassamaj-UK" />
    @endif
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="500" />

@stop
@section('header_js')
@endsection
@section('main')


    <!-- .custom-header -->
    <div id="custom-header"
         @if(file_exists('storage/'.$setting->value) && $setting->value != '')
         style="background-image: url('{{asset('storage/'.$setting->value)}}')"
            @endif
    >
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title">wvent</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="{{route('home')}}" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>{{$event->slug}}</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>


    <section class="single-page-content-section">

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-page-content">
                        <h1>{{$event->title}}</h1>

                        <ul class="event-meta-single-page">
                            <li><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</li>
                            <li><i class="fa fa-map-marker"></i> {{$event->location}}</li>
                            <li>
                                <a  class="btn_hover view-more-btn" href="javascript:void(0)" onclick="fb_share('{{route('event.show',[$event->slug])}}', '{{ $event->title}}')">
                                    Share
                                </a>
                            </li>
                        </ul>

                        <div class="single-page-img">
                            @if(file_exists('storage/'.$event->image) && $event->image != '')

                                <img src="{{asset('storage/'.$event->image)}}" alt="{{$event->title}}">
                            @endif
                        </div>


                        <div class="single-page-main-content">
                            {!! $event->description !!}
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    @include('frontend.inc.sidebar')
                </div>
            </div>
        </div>

    </section>


@endsection

@section('scripts')


    <script type="text/javascript">

    </script>
@endsection
