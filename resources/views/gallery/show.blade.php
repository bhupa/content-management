@extends('layouts.app')
@section('title', $gallery->slug)
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
        <h1 class="page-title">{{$gallery->title}}</h1>
        <div id="breadcrumb">
          <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
            <ul class="trail-items">
              <li class="trail-item trail-begin"><a href="{{route('home')}}" rel="home"><span>Home</span></a></li>
              <li class="trail-item trail-end"><span>{{$gallery->slug}}</span></li>
            </ul>
          </div> <!-- .breadcrumbs -->
        </div> <!-- #breadcrumb -->
      </div> <!-- .container -->
    </div>  <!-- .custom-header-content -->
  </div>
  <!-- .custom-header -->


  <div id="content" class="site-content global-layout-right-sidebar">
    <div class="container">
      <div class="inner-wrapper">
        <div id="primary" class="content-area">
          <main id="main" class="site-main">
            <h1 class="page-title">Gallery </h1>
            <section class="home-blog gallery">
              <div class="container">
                <div class="row mb-5">
                  <div class="col-md-12 text-center">
                    <h2>Gallery</h2>
                  </div>
                </div>

                <div class="row">
                  <div class="row" id="gallery-index-page">
                    @foreach($galleryImages as $gallery)
                      <div class="col-lg-3 col-md-4 col-xs-6  mb-20">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{$gallery->gallery->title}}"
                           data-image="{{asset('storage/'.$gallery->image)}}"
                           data-target="#image-gallery">

                          @if(file_exists('storage/'.$gallery->image) && $gallery->image != '')
                            <img class="card-img"
                                 src="{{asset('storage/'.$gallery->image)}}"
                                 alt="{{$gallery->gallery->title}}" >
                          @endif

                        </a>


                      </div>
                    @endforeach

                  </div>


                  <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="image-gallery-title"></h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                          </button>

                          <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="pagination-wrapper">
                        <div class="more-wrapper">
                            <nav class="navigation pagination"> {{$galleryImages->links('vendor.pagination.custom')}}
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
              @include('event.list')


          </main>
          <!-- #main -->
        </div>
        <!-- #primary -->
      {{--@include('frontend.inc.sidebar') --}}
      <!-- .sidebar -->
      </div>
      <!-- #inner-wrapper -->
    </div>
    <!-- .container -->
  </div>
@endsection
