@extends('layouts.app')
@section('title', $event->title)
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