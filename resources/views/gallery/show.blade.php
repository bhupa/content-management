@extends('layouts.app')
@section('title', $gallery->title)
@section('footer_js')


@endsection
@section('main')

<!-- .custom-header -->
<div id="content" class="site-content global-layout-right-sidebar">
  <div class="container">
    <div class="inner-wrapper">
      <div id="primary" class="content-area">
        @if($galleryImages->isNotEmpty())
        <h1 class="page-title">{{$gallery->title}}</h1>
        @endif
        <main id="main" class="site-main">
          <ul class="gallerylist galleydetail">
            @foreach($galleryImages as $galleryImage)
            <li>
              <div class="item-inner-wrapper"> @if(file_exists('storage/'.$galleryImage->image) && $galleryImage->image !== '') <img class="portfolio-thumb img-border " src="{{asset('storage/'.$galleryImage->image)}}" alt="{{$galleryImage->gallery_id}}"  /> @endif
                <div class="overlay"></div>
                <a  class="zoom-icon" data-gal="prettyPhoto[product-gallery]" rel="bookmark" href="{{asset('storage/'.$galleryImage->image)}}"><i class="icon-focus"></i></a>
              
              </div>
            </li>
            
            
            @endforeach
          </ul>
          <div class="more-wrapper" style="margin-top: 0"> {{ $galleryImages->render('vendor.pagination.custom')}} </div>
          <div style="clear:both"></div>
          @if($videos->isNotEmpty())
          <h2 style="margin-top: 0">Video</h2>
          @endif
          <div> @foreach($videos as $video)
            <div class="vdo_grid">
              
              <a data-v-aa2be910="" data-modal_name="myModal_{{ $video->id }}" data-fancybox="true" href="#video45" class="video-content video-1 openModal"><img data-v-aa2be910="" src="https://i3.ytimg.com/vi/{{$video->link}}/maxresdefault.jpg" alt="Time Is Money | Buddha Air | Fly With Us" class="img-fluid2"><i data-v-aa2be910="" class="far fa-play-circle play-button"></i></a>
              <h5>{{$video->title}}</h5>
              
             <!-- <div id="myModal_{{ $video->id }}" class="modal">
                <span class="close" data-modal_name="myModal_{{ $video->id }}">&times;</span>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{$video->link}}" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>-->
              
              <div id="myModal_{{ $video->id }}" class="modal">
              <div class="modal-content">
                <span class="close" data-modal_name="myModal_{{ $video->id }}">&times;</span>
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$video->link}}" frameborder="0" allowfullscreen></iframe>
                       
                
              </div>

            </div>
              
         
              
            </div>
            @endforeach </div>

          <div class="more-wrapper" style="margin-top: 0"> {{ $videos->render('vendor.pagination.custom')}} </div>
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



@section('script') 

<script>

  $(function(){
	  $(".openModal").click(function(){
		  var modal_id = $(this).data("modal_name");
		  $("#"+modal_id).css("display", "block");
	  });
	  
	  $(".close").click(function(){
		  var modal_id = $(this).data("modal_name");
		  $("#"+modal_id).css("display", "none");
	  });
  });
</script>
@endsection