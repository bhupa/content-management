@extends('layouts.app')
@section('title', $content->title)
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

                        <h1 class="">About Us</h1>
                        <span class="caption mb-3">About us page</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
                <div class="col-md-5 ml-auto">


                    <div class="section-heading text-left">
                        <h2 class="mb-5">{{$content->title}}</h2>
                    </div>
                    <p class="mb-4">{!! $content->description !!}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Hotel Features</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <span class="flaticon-pool display-3 mb-3 d-block text-primary"></span>
                        <h2 class="h5">Swimming Pool</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <span class="flaticon-desk display-3 mb-3 d-block text-primary"></span>
                        <h2 class="h5">Hotel Teller</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <span class="flaticon-exit display-3 mb-3 d-block text-primary"></span>
                        <h2 class="h5">Fire Exit</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <span class="flaticon-parking display-3 mb-3 d-block text-primary"></span>
                        <h2 class="h5">Car Parking</h2>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <span class="flaticon-hair-dryer display-3 mb-3 d-block text-primary"></span>
                        <h2 class="h5">Hair Dryer</h2>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <span class="flaticon-minibar display-3 mb-3 d-block text-primary"></span>
                        <h2 class="h5">Minibar</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <span class="flaticon-drink display-3 mb-3 d-block text-primary"></span>
                        <h2 class="h5">Drinks</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <span class="flaticon-cab display-3 mb-3 d-block text-primary"></span>
                        <h2 class="h5">Car Airport</h2>
                    </div>
                </div>







            </div>
        </div>
    </div>


@endsection