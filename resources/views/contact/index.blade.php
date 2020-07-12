@extends('layouts.app')
@section('title', 'Contact Us')
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
                <h1 class="page-title">Contact Us</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="{{route('home')}}" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Contact Us</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="contact-map">
                        <div class="map-inner-wrapper">
                            <iframe style="border:0;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14132.557418569479!2d85.3106242!3d27.6820875!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe7ff208549dfe1ca!2sFair+Trade+Group+Nepal!5e0!3m2!1sen!2snp!4v1554706599732!5m2!1sen!2snp" width="700" height="490px"></iframe>
                        </div> <!-- .map-inner-wrapper -->
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="contact-form-area contactdesc">
                        <h3 class="contact-title">Contact Us</h3>
                        <div id="contact-form" class="contact-form">
                            <div id="message">
                            </div>
                            {{--<form method="POST" action="{{route('contact.store')}}" accept-charset="UTF-8" class="form-horizontal" id="validator" enctype="multipart/form-data"><input name="_token" type="hidden" value="qBIHZNqTNiS2QI4rmuVDzQZScfT6uO6S8cjVvpC1">--}}

                                {!! Form::open(['route'=>'contact.store','id'=>'contact-form']) !!}
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <span>{!! \Session::get('success') !!}</span>
                                </div>

                            @endif
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name *" style="width: 100%;">

                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                                <div style="margin-bottom: 30px;"></div>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email *" style="width: 100%;">

                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif<br>

                                <textarea class="form-control" name="message" id="comments" rows="3" placeholder="Message *" style="resize:none;"></textarea>

                            @if($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                                <div style="margin-bottom: 20px;"></div>
                                {{--<div>--}}
                                    {{--<script src="https://www.google.com/recaptcha/api.js?" async="" defer=""></script>--}}

                                    {{--<div data-sitekey="6Ley3K0UAAAAAEPLFEz4f8BRsHurKpnr5_93p3zj" class="g-recaptcha"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Ley3K0UAAAAAEPLFEz4f8BRsHurKpnr5_93p3zj&amp;co=aHR0cHM6Ly9mYWlydHJhZGVncm91cG5lcGFsLm9yZzo0NDM.&amp;hl=en&amp;v=nuX0GNR875hMLA1LR7ayD9tc&amp;size=normal&amp;cb=39i89nf3v3k6" width="304" height="78" role="presentation" name="a-wg0px2u61s5e" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>--}}
                                {{--</div>--}}
                                <div style="margin-bottom: 30px;"></div>

                                <button type="submit" value="SEND" id="submit">Submit</button>

                            {!! Form::close(); !!}
                        </div><!-- .contact-form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')

    <script>

        jQuery(document).ready(function() {
            // $("#contact-form").on('submit',function(){
            //     var e = $(this).attr("action");
            //     return $("#message").slideUp(750, function() {
            //         $("#message").hide(), $("#submit").attr("disabled", "disabled"), $.post(e, {
            //             name: $("#name").val(),
            //             email: $("#email").val(),
            //             comments: $("#comments").val(),
            //             verify: $("#verify").val()
            //         }, function(e) {
            //             document.getElementById("message").innerHTML = e;
            //             $("#message").slideDown("slow");
            //             $("#contactform img.loader").fadeOut("slow", function() {
            //                 $(this).remove();
            //             });
            //             $("#submit").removeAttr("disabled");
            //             null != e.match("success") && $("#contactform").slideUp("slow");
            //         })
            //     }), !1
            // });

        });
    </script>
@endsection