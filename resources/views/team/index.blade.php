@extends('layouts.app')
@section('title', 'Executive Committee')
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
                <h1 class="page-title">Executive Committee</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="{{route('home')}}" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Executive Committee</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->


    <section class="message team-section team-page" >
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Executive Committee</h2>
                </div>
            </div>



                <div class="row justify-content-center">
                    <div class="d-flex ">
                        <!-- login box -->


                                <div class="form-group">
                                    <select name="year" id="executive-select-btn" class="form-control">
                                        <option value="">Ecexutive Committee</option>
                                        @foreach($teamList as $team)
                                            {{--                                   @php  $date = DateTime::createFromFormat("Y-m-d", $team->date) @endphp--}}

                                            <option value="{{$team->new_date}}" @if($team->new_date == date('Y')) selected="selected" @endif>{{$team->new_date}} &nbsp; Executive Committee</option>
                                        @endforeach
                                    </select>
                                </div>


                    </div>
                </div>





            <div class="executive-lists">
            <div class="row justify-content-center">

                @foreach($executives as $team)
                    @if($loop->first)
                    <div class="col align-self-center">

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
                    @endif
                @endforeach
            </div>
            <div class="row justify-content-center  second-team-section" style="margin-top: 50px">


                @foreach($executives as $key=>$team)
                    @if($key > 0  )
                        <div class="col-md-4">
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
                        </div>
                    @endif
                @endforeach
                {{--<div class="col-md-4 offset-md-4">.col-md-4 .offset-md-4</div>--}}

            </div>
            </div>
        </div>

    </section>
{{--    <section class="message team-section team-page"  style="margin-top: 150px;margin-bottom:100px;">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12 text-center">--}}
{{--                    <h2>Members</h2>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row justify-content-center  second-team-section">--}}


{{--                @foreach($members as $key=>$team)--}}

{{--                        <div class="col-md-4">--}}
{{--                            <div class="team-top">--}}
{{--                                <div class="team-wrapper">--}}
{{--                                    @if(file_exists('storage/'.$team->image) && $team->image != '')--}}
{{--                                        <img src="{{asset('storage/'.$team->image)}}" alt="{{$team->name}}" class="team-image">--}}
{{--                                    @endif--}}

{{--                                    <div class="content-details">--}}
{{--                                        <h4>{{$team->name}}</h4>--}}
{{--                                        <h5>Member</h5>--}}
{{--                                        <p>{{$team->address}}</p>--}}
{{--                                    </div>--}}

{{--                                    <ul class="team-social-link">--}}
{{--                                        <li>--}}
{{--                                            <a href="@if($team->facebook !== '') {{$team->facebook}} @else # @endif"> <i class="fa fa-facebook"></i> </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="@if($team->linkedin !== '') {{$team->linkedin}} @else # @endif"> <i class="fa fa-linkedin"></i> </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="@if($team->twitter !== '') {{$team->twitter}} @else # @endif"> <i class="fa fa-twitter"></i> </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}




{{--                            </div>--}}
{{--                        </div>--}}
{{--                @endforeach--}}
{{--                --}}{{--<div class="col-md-4 offset-md-4">.col-md-4 .offset-md-4</div>--}}

{{--            </div>--}}
{{--        </div>--}}


{{--    </section>--}}

    @include('event.list')
    @include('gallery.list')
    @include('blog.list')

@endsection

@section('script')

    <script>


        </script>
@endsection

