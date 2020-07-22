
<!DOCTYPE html>
<html lang="en">
<head>
  <title> KHASHA SAMAJA |@yield('title') </title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{--<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700|Anton" rel="stylesheet">--}}
  <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
  {{--<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}">--}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
  @yield('style_css')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div id="topbar" class="d-none d-lg-flex">
  <div class="container d-flex">
    <div class="contact-info mr-auto">
      @foreach($settings as $setting)
        @if($setting->slug =='email')
      <i class="fa fa-envelope"></i> <a href="mailto:contact@example.com">{{$setting->value}}</a>
        @endif
          @if($setting->slug =='contact')
      <i class="fa fa-phone"></i> {{$setting->value}}
          @endif

        @endforeach
    </div>
    <div class="social-links">
      @foreach($settings as $setting)
        @if($setting->slug =='twitter')
      <a href="{{$setting->value}}" class="twitter"><i class="fa fa-twitter"></i></a>
        @endif
          @if($setting->slug =='facebook')
      <a href="{{$setting->value}}" class="facebook"><i class="fa fa-facebook"></i></a>
          @endif
            @if($setting->slug =='instagram')
      <a href="{{$setting->value}}" class="instagram"><i class="fa fa-instagram"></i></a>
            @endif
              @if($setting->slug =='linkedin')
      <a href="{{$setting->value}}" class="linkedin"><i class="fa fa-linkedin"></i></a>
              @endif
        @endforeach
    </div>
  </div>
</div>

<div class="top-logo">
 <div class="container">
     <div class="row">
         <div class="col-md-7">
             <div class="logo-image">
                 @foreach($settings as $setting)
                     @if($setting->slug =='menu-banner')
                         <img  src="{{asset('storage/'.$setting->value)}}" alt="{{$setting->name}}">
                     @endif
                 @endforeach
             </div>
         </div>
         <div class="col-md-5">
             <div class="top-side-men">
                 @foreach($settings as $setting)
                     @if($setting->slug =='menu-banner-side-one')
                         <img  src="{{asset('storage/'.$setting->value)}}" alt="{{$setting->name}}">
                     @endif
                 @endforeach
             </div>
             <div class="top-side-men">
                 @foreach($settings as $setting)
                     @if($setting->slug =='menu-banner-side-two')
                         <img  src="{{asset('storage/'.$setting->value)}}" alt="{{$setting->name}}">
                     @endif
                 @endforeach
             </div>
             {{--<div class="logo-image second-image">--}}
             {{--<img  src="{{asset('frontend/img/khas2.jpg')}}" alt="">--}}
             {{--</div>--}}
             {{--</div>--}}
             {{--<div class="col-md-3">--}}
             {{--<div class="logo-image third-image">--}}
             {{--<img  src="{{asset('frontend/img/khas3.jpg')}}" alt="">--}}
             {{--</div>--}}
         </div>

     </div>
 </div>
</div>


<nav class="navbar navbar-expand-lg navbar-dark  ">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ">
      <li class="nav-item">
      <a class="nav-link " href="{{route('home')}}">Home</a>
      </li>

      @foreach($contents as $content)
      @if($content->child->isEmpty() && $content->parent_id == '' )

      <li class="nav-item"  >
      <a class="nav-link " href="{{route('content.show',[$content->slug])}}">{{$content->title}}</a>
      </li>

      @else
      @if($content->child->isNotEmpty() && $content->parent_id == '' )
      <?php $sub_menus = $content->child()->pluck('slug')->toArray();?>
      <li class="nav-item dropdown ">
      <a class="nav-link dropdown-toggle" href="javascript:void(0)">{{$content->title}}</a>
      <div class="dropdown-menu">
      @foreach($content->child as $firstchild)


      <a class="dropdown-item" href="{{route('content.show',[$firstchild->slug])}}">{{$firstchild->title}}</a>


      @endforeach
      </div>
      @endif
      @endif
      @endforeach
      {{--<li class="nav-item dropdown">--}}
      {{--<a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adoption</a>--}}
      {{--<div class="dropdown-menu" aria-labelledby="dropdown04">--}}
      {{--<a class="dropdown-item" href="adoption.html">Adoption</a>--}}
      {{--<a class="dropdown-item" href="adoption.html">Waiting Children</a>--}}
      {{--<a class="dropdown-item" href="adoption-how-to.html">How to Adopt</a>--}}
      {{--</div>--}}
      {{--</li>--}}
      <li class="nav-item">
      <a class="nav-link" href="{{route('executive-committee.index')}}">Executive Committee</a>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('members.index')}}">Members</a>
        </li>
      <li class="nav-item">
      <a class="nav-link" href="{{route('event.index')}}">Event</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{route('blogs.index')}}">Blog</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{route('gallery.index')}}">Gallery</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="{{route('contact.index')}}">Contact</a>
      </li>
    </ul>

  </div>
</nav>

@yield('main')

<!-- start footer -->
@include('layouts.footer')
<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/jquery-equal-height.min.js')}}"></script>



<script>
    let modalId = $('#image-gallery');
    $(document).ready( function () {
        $('#banner-carsoule').owlCarousel({
            items: 1,
            loop:true,
            dots: false,
            nav: false,
            autoplay:true,
            autoplayTimeout:3000,

            navText: ["<i class='fa fa-chevron-left '></i>","<i class='fa fa-chevron-right'></i>"],
            responsive: {
                480: {
                    items: 1
                },
                765: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
        $(document).on('change','#executive-select-btn',function(){
            var date = $(this).find('option:selected').val();
            $.ajax({
                type: "POST",
                url: "{{ route('executive-committee.list') }}",
                data: {
                    'date': date,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'html',
                success: function (teams) {
                    setTimeout(function(){
                        $("#overlay-load").fadeOut(300);
                        $('.executive-lists').html(teams)
                    },500);


                },
                error: function (e) {
                    if (e.responseJSON.message) {
                        swal('Error', e.responseJSON.message, 'error');
                    } else {
                        swal('Error', 'Something went wrong while processing your request.', 'error')
                    }
                }
            });

        })


        function equal_height() {
// Equal Card Height

            $('.home-blog').jQueryEqualHeight('.post-entry');
            $('.home-blog').jQueryEqualHeight('.card-img-top');
            $('#our-events').jQueryEqualHeight('.event');

            // $('.event').jQueryEqualHeight('.event-image');

            $('.blogs-sider-bar ').jQueryEqualHeight('.side-bar-image');

            $('.blogs-sider-bar ').jQueryEqualHeight('.row');



            $('.team-section').jQueryEqualHeight('.team-top');
            $('.team-section').jQueryEqualHeight('.team-image');

            $('.features_area').jQueryEqualHeight('.features_item p');

            $('.gallery').jQueryEqualHeight('.img-thumbnail');
            $('.gallery').jQueryEqualHeight('.gallery-title');

            $('#gallery-index-page').jQueryEqualHeight('.card-img');







            // $('#gallery-index-page .thumbnail').jQueryEqualHeight('.img-thumbnail');



// $('.jQueryEqualHeight3').jQueryEqualHeight('.card');
        }

        $(window).on('load', function (event) {
            equal_height();
        });
        $(window).resize(function (event) {
            equal_height();
        });


        // gallery image js

        loadGallery(true, 'a.thumbnail');

        //This function disables buttons when needed
        function disableButtons(counter_max, counter_current) {
            $('#show-previous-image, #show-next-image')
                .show();
            if (counter_max === counter_current) {
                $('#show-next-image')
                    .hide();
            } else if (counter_current === 1) {
                $('#show-previous-image')
                    .hide();
            }
        }

        function loadGallery(setIDs, setClickAttr) {
            let current_image,
                selector,
                counter = 0;

            $('#show-next-image, #show-previous-image')
                .click(function () {
                    if ($(this)
                        .attr('id') === 'show-previous-image') {
                        current_image--;
                    } else {
                        current_image++;
                    }

                    selector = $('[data-image-id="' + current_image + '"]');
                    updateGallery(selector);
                });

            function updateGallery(selector) {
                let $sel = selector;
                current_image = $sel.data('image-id');
                $('#image-gallery-title')
                    .text($sel.data('title'));
                $('#image-gallery-image')
                    .attr('src', $sel.data('image'));
                disableButtons(counter, $sel.data('image-id'));
            }

            if (setIDs == true) {
                $('[data-image-id]')
                    .each(function () {
                        counter++;
                        $(this)
                            .attr('data-image-id', counter);
                    });
            }
            $(setClickAttr)
                .on('click', function () {
                    updateGallery($(this));
                });
        }

    });

</script>

</html>
