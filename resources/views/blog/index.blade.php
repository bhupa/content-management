@extends('layouts.app')
@section('title', 'Blog')
@section('header_js')
@endsection
@section('main')

    <!-- .site-header -->

 
    <!-- .custom-header -->
    <div id="content" class="site-content global-layout-no-sidebar">
        <div class="container">
            <div class="inner-wrapper">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" >
                         
                        <!-- .section-latest-posts -->
                        <aside class="section section-latest-posts lite-background">
                            <div class="container">
                                <div class="latest-posts-section">
                                    <h1 class="page-title">Blog</h1>
                                    <!-- .section-title-wrap -->
                                    <div class="inner-wrapper">
                                        @foreach($blogs as $new)
                                            <div class="col-grid-4 latest-posts-item newslist-page">
                                                <div class="latest-posts-wrapper box-shadow-block">
                                                    <div class="latest-posts-thumb">
                                                        <a href="{{route('blogs.show',[$new->slug])}}" >
                                                            @if(file_exists('storage/'.$new->image) && $new->image != '')
                                                                <img alt="{{$new->title}}" src="{{asset('storage/'.$new->image)}}">
                                                            @endif
                                                        </a> </div>
                                                    <div class="latest-posts-text-content-wrapper">
                                                        <div class="latest-posts-text-content">
                                                            <h3 class="latest-posts-title"> <a href="{{route('blogs.show',[$new->slug])}}">{{str_limit($new->title,'60','...')}}</a> </h3>
                                                            <div class="entry-meta latest-posts-meta"> <span class="posted-on">{{$new->created_at->format('M d Y')}}</span> </div>
                                                            <div class="latest-posts-summary">
                                                                {!!  str_limit($new->description,'80','...') !!}
                                                            </div>
                                                            <a href="{{route('blogs.show',[$new->slug])}}" class="more-link button-curved">Know More</a> </div>

                                                    </div>

                                                </div>

                                            </div>
                                        @endforeach




                                        <div class="more-wrapper">
                                            {{$blogs->links('vendor.pagination.custom')}}
                                            {{--<nav class="navigation pagination">--}}
                                            {{--<div class="nav-links">--}}
                                            {{--<span class="page-numbers current">1</span>--}}
                                            {{--<a class="page-numbers" href="#">2</a>--}}
                                            {{--<a class="page-numbers" href="#">3</a>--}}
                                            {{--<a class="next page-numbers" href="#">Next »</a>--}}
                                            {{--</div> <!-- .nav-links -->--}}
                                            {{--</nav>--}}
                                        </div>

                                    </div>
                                    <!-- .inner-wrapper -->
                                </div>
                                <!-- .container -->
                            </div>
                            <!-- .latest-posts-section -->
                        </aside>
                        <!-- .section-latest-posts -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .inner-wrapper -->
        </div>
        <!-- .container -->
    </div>
    <!-- #content-->
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