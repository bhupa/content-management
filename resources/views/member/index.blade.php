@extends('layouts.app')
@section('title', 'Members')
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
                <h1 class="page-title">Member</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="{{route('home')}}" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Member</span></li>
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
                    <h2>Members</h2>
                </div>
            </div>
            <div class="executive-lists">
                <div class="row justify-content-center  second-team-section" style="margin-top: 0px">


                    @foreach($members as $key=>$team)
                            <div class="col-md-4">
                                <div class="team-top">
                                    <div class="team-wrapper">
                                        @if(file_exists('storage/'.$team->image) && $team->image != '')
                                            <img src="{{asset('storage/'.$team->image)}}" alt="{{$team->name}}" class="team-image">
                                        @endif

                                        <div class="content-details">
                                            <h4>{{$team->name}}</h4>
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
                    @endforeach
                    {{--<div class="col-md-4 offset-md-4">.col-md-4 .offset-md-4</div>--}}
                        <div class="more-wrapper">
                            <nav class="navigation pagination"> {{$members->links('vendor.pagination.custom')}}
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

    @include('event.list')
    @include('blog.list')
@endsection

@section('script')

    <script>


    </script>
@endsection

