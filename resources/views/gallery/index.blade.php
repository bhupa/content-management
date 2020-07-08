@extends('layouts.app')
@section('title', 'Gallery ')
@section('header_js')
@endsection
@section('main')

<!-- .custom-header -->
<div id="content" class="site-content global-layout-right-sidebar">
  <div class="container">
    <div class="inner-wrapper">
      <div id="primary" class="content-area">
        <main id="main" class="site-main">
         <h1 class="page-title">Gallery </h1>
          <ul class="gallerylist">
            @foreach($galleries as $gallerie)
            <li>
              <div class="item-inner-wrapper"> <a href="{{route('gallery.show',[$gallerie->slug])}}"> @if(file_exists('storage/'.$gallerie->image) && $gallerie->image !== '') <img class="aligncenter img-border " src="{{asset('storage/'.$gallerie->image)}}" alt="{{$gallerie->title}}" /> @endif </a> </div>
              <a class="gallerytxt" href="{{route('gallery.show',[$gallerie->slug])}}"> {{$gallerie->title}} </a> </li>
            @endforeach
          </ul>
          <div class="more-wrapper">
            <nav class="navigation pagination"> {{$galleries->links('vendor.pagination.custom')}}
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
        </main>
        <!-- #main --> 
      </div>
      <!-- #primary --> 
      @include('frontend.inc.sidebar') 
      <!-- .sidebar --> 
    </div>
    <!-- #inner-wrapper --> 
  </div>
  <!-- .container --> 
</div>
@endsection 