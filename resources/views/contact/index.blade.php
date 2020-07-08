@extends('layouts.app')
@section('title', 'Contact Us')
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

                    <h1 class="">Contact Us</h1>
                    <span class="caption mb-3">Contact us page</span>
                </div>
            </div>
        </div>
    </div>
    @endif

  <div class="site-section site-section-sm">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-8 mb-5">


         {{Form::open(array('route'=>'contact.store', 'class'=>'p-5 bg-white','id'=>'contact-form'))}}

            @if(session()->has('success'))
                <div class="alert alert-success" > {{ session()->get('success') }} </div>
            @endif
            <div class="row form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="fullname">Full Name <span>*</span></label>
                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name">
              </div>
                @if($errors->has('fullname'))
                    <span class="alert alert-danger">
                            <strong>
                                {{$errors->first('fullname')}}
                            </strong>
                        </span>
                @endif
            </div>
            <div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <div class="col-md-12">
                <label class="font-weight-bold" for="email">Email <span>*</span></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
              </div>
                @if($errors->has('email'))
                    <span class="alert alert-danger">
                            <strong>
                                {{$errors->first('email')}}
                            </strong>
                        </span>
                @endif
            </div>


            <div class="row form-group {{ $errors->has('phone') ? 'has-error': '' }}">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="phone">Phone <span>*</span></label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone No">
              </div>
                @if($errors->has('phone'))
                    <span class="alert alert-danger">
                            <strong>
                                {{$errors->first('phone')}}
                            </strong>
                        </span>
                @endif
            </div>

            <div class="row form-group {{ $errors->has('message') ? 'has-error' : '' }}">
              <div class="col-md-12">
                <label class="font-weight-bold" for="message">Message <span>*</span></label>
                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Leave your Message/Questions"></textarea>
              </div>
                @if($errors->has('message'))
                    <span class="alert alert-danger">
                            <strong>
                                {{$errors->first('message')}}
                            </strong>
                        </span>
                @endif
            </div>
            <div class="row form-group {{ $errors->has('g-recaptcha-response') ? 'has-error' : '' }}">
                <div class="col-md-12">
                    <label class="font-weight-bold" for="message"></label>
                    {!! \NoCaptcha::renderJs() !!}
                    {!! \NoCaptcha::display() !!}
                    @if ($errors->has('g-recaptcha-response')) <span class="alert alert-danger"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> @endif </span> </label>

                </div>

            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
              </div>
            </div>


          {!! Form::close() !!}
        </div>

        <div class="col-lg-4">
          <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">Contact Info</h3>
            @foreach($settings as $setting)

                  @if($setting->name == 'Address')
                <p class="mb-0 font-weight-bold">Address</p>
                  <p class="mb-4">{{$setting->value}}</p>
                  @endif

              @if($setting->name == 'Phone')
                      <p class="mb-0 font-weight-bold">Phone</p>
                  <p class="mb-4"><a href="JavaScript:Void(0)">{{$setting->value}}</a></p>
                 @endif


                @if($setting->name == 'Email')
                      <p class="mb-0 font-weight-bold">Email Address</p>
                  <p class="mb-0"><a href="mailto:{{$setting->value}}">{{$setting->value}}</a></p>
                   @endif
              @endforeach

          </div>


        </div>
      </div>
    </div>
  </div>

@endsection