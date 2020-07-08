@extends('layouts.app')
@section('title', $banner->title)
@section('header_js')
@endsection
@section('main')


    <!-- .site-header -->

    <!-- #main-navigation -->
    <div id="custom-header">
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title">{{$banner->title}}</h1>
                <div id="breadcrumb">
                    <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="{{route('home')}}" rel="home"><span>Home</span></a></li>

                            <li class="trail-item trail-end"><span>{{$banner->title}}</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div> <!-- .custom-header -->
    <div id="content" class="site-content default-full-width blog-grid-layout">
        <div class="container">
            <div class="inner-wrapper">
                <div id="primary" class="content-area">

                    <main id="main" class="site-main">

                        <div class="inner-wrapper">
                            @if(file_exists('storage/'.$banner->image) && $banner->image != '')
                                <img src="{{asset('storage/'.$banner->image)}}" alt="{{$banner->caption}}" style="margin-bottom: 30px;width:100%; height:400px;">
                            @endif
                            {!! $banner->description !!}

                        </div> <!-- .inner-wrapper -->


                    </main> <!-- #main -->

                </div> <!-- #primary -->

            </div> <!-- #inner-wrapper -->
        </div><!-- .container -->
    </div> <!-- #content-->
@endsection

@section('scripts')


    <script type="text/javascript">
        $('.carousel').carousel({
            interval: 2000
        })

        $('#room-id').on('change',function() {
            var roomId = $('#room-id').val();

            $.get("<?php echo url('/')?>" + "/roomlist/"+roomId, function(data, status){
                if(data != 'no data'){
                    var numberOfRooms = data.number_of_rooms;

                    if(numberOfRooms != 0){
                        var options = '';
                        for(i=1; i<= numberOfRooms; i++){
                            options += '<option value="'+i+'">'+i+'</option>';
                        }

                        $('#number-of-rooms option').remove();
                        $('#number-of-rooms').append(options);
                    }else{
                        $('#number-of-rooms option').remove();
                        $('#number-of-rooms').append('<option>'+0+'<option>');
                    }

                }
            });
        });
    </script>
@endsection