@extends('layouts.app')
@section('title', 'Blog')
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
                <h1 class="page-title">Blog</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="{{route('home')}}" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Blog</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->
    <section class="home-blog ">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Our Blogs</h2>
                </div>
            </div>
            <div class="row">

                @foreach($blogs as $blog)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-30">
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

                    <div style="text-align:center; margin-top: 40px">
                    <div class="more-wrapper">
                        <nav class="navigation pagination"> {{$blogs->links('vendor.pagination.custom')}}
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
    @include('gallery.list')

@endsection
