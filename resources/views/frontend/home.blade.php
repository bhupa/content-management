@extends('layouts.app')
@section('title', config('app.name') )
@section('style_css')

@endsection
@section('header_js')
@endsection
@section('main')
    <div class="slide-one-item home-slider owl-carousel">
        @foreach($banners as $banner)
            <div class="site-blocks-cover overlay" style="background-image: url('{{asset('storage/'.$banner->image)}}');" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade">

                            <h1 class="mb-2">{{$banner->title}}</h1>
                            <h2 class="caption">{{$banner->description}}</h2>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach





    </div>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Our Rooms</h2>
                </div>
            </div>
            <div class="row">
                @foreach($roomlists as $roomlist)
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="hotel-room text-center">
                        <a href="{{route('room.show',[$roomlist->slug])}}" class="d-block mb-0 thumbnail">
                            @if(file_exists('storage/'.$roomlist->cover_image)  && $roomlist->cover_image !== '')
                            <img src="{{asset('storage/'.$roomlist->cover_image)}}" alt="{{$roomlist->name}}" class="img-fluid">
                            @endif
                        </a>
                        <div class="hotel-room-body">
                            <h3 class="heading mb-0"><a href="{{route('room.show',[$roomlist->slug])}}">{{$roomlist->name}}</a></h3>
                            <strong class="price">{{$roomlist->price}} / per month</strong>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0">

                    <div class="img-border">
                        @if(file_exists('storage/'.$content->image) && $content->image !== '')
                            <img src="{{asset('storage/'.$content->image)}}" alt="{{$content->title}}" class="img-fluid">
                        @endif
                        </a>
                    </div>


                </div>
                <div class="col-md-6 ml-auto">


                    <div class="section-heading text-left">
                        <h2 class="mb-5">{{$content->title}}</h2>
                    </div>
                    <p class="mb-4">{!! $content->short_description !!}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Service</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="{{asset('frontend/images/peace.png')}}" alt="Peacefull" style="border-radius: 50%;width: 100px; height: 100px;">
                        <h2 class="h5" style="margin-top: 15px;">Peace Environment</h2>

                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="{{asset('frontend/images/cctv.png')}}" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">CCTV Security</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="{{asset('frontend/images/gaurd.jpg')}}" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Security Gaurd</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="{{asset('frontend/images/water.jpg')}}" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Hot & Cold</h2>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="{{asset('frontend/images/food.png')}}" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Hygienic Food</h2>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="{{asset('frontend/images/meal.jpg')}}" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Different Food</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="{{asset('frontend/images/wifi.png')}}" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Free Wifi</h2>
                    </div>
                </div>
               







            </div>
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Our Gallery</h2>
                </div>
            </div>
            <div class="row no-gutters">
                @foreach($galleries as $gallery)
                <div class="col-md-6 col-lg-3">
                    @if(file_exists('storage/'.$gallery->image) && $gallery->image !== '')
                    <a href="{{asset('storage/'.$gallery->image)}}" class="image-popup img-opacity">
                        <img src="{{asset('storage/'.$gallery->image)}}" alt="{{$gallery->title}}" class="img-fluid">
                    </a>
                        @endif
                </div>
                    @endforeach


            </div>
        </div>
    </div>






    <div class="site-section block-14 bg-light">

        <div class="container">

            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2>What People Say</h2>
                </div>
            </div>

            <div class="nonloop-block-14 owl-carousel">
                @foreach($testimonials as $testimonial)

                <div class="p-4">
                    <div class="d-flex block-testimony">
                        <div class="person mr-3">
                            @if(file_exists('storage/'.$testimonial->image) && $testimonial->image !== '')
                            <img src="{{asset('storage/'.$testimonial->image)}}" alt="{{$testimonial->name}}" class="img-fluid rounded">
                                @endif
                        </div>
                        <div>
                            <h2 class="h5">{{$testimonial->name}}</h2>
                            <blockquote>{!! $testimonial->description !!}</blockquote>
                        </div>
                    </div>
                </div>
                    @endforeach


            </div>

        </div>

    </div>

@endsection

@section('script') 

@endsection