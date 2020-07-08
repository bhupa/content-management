@extends('layouts.app')
@section('title','About')
@section('header_js')
@endsection
@section('main')


    <!-- .site-header -->

    <!-- #main-navigation -->
    <div id="pagebackground" style="background:url(img/slider3.jpg);" class="parallax-bg">
    </div>
    <section id="inner-container-section" class="mt90" >
        <div class="container">
            <div class="row">
                @if(!empty($about))
                    <div class="col col-xs-12 col-sm-4 col-md-3 title-full">

                        <h1 class="main-title">{{$about['title']}}</h1>

                    </div>
                    <div class="col col-xs-12 col-sm-8 col-md-9">
                        <div class="main-title-txt"> {!! $about['short_description'] !!}</div>
                    </div>
                @endif

                <div class="clearboth"></div>
                <div class="inner-container">
                    <div class="col col-xs-12 col-sm-6 col-md-6 aboutimg">
                        @if(file_exists('storage/'.$about['image']) && $about['image'] !== '')
                            <img src="{{asset('storage/'.$about['image'])}}" alt="{{$about['title']}}" type="">
                        @endif
                    </div>
                    <div class="col col-xs-12 col-sm-6 col-md-6 abouttext">
                        <div>{!! $about['description'] !!}</div>
                    </div>

                    <div class="clearboth"></div>
                    <div class="col col-xs-12">
                        <div class="row">
                            <ul class="service-ul">
                                @foreach($services as $service)
                                    <li class="col col-xs-12 col-sm-6 col-md-4">
                                        <div> <i class="icon">
                                                @if(file_exists('storage/'.$service->icon_image) && $service->icon_image !== '')
                                                    <img src="{{asset('storage/'.$service->icon_image)}}" alt="{{$service->title}}">
                                                @endif
                                            </i>
                                            <h3><a href="{{route('services.show',[$service->slug])}}">{{$service->title}}</a></h3>
                                            <div class="service-text">{!! str_limit($service->description,'80','') !!}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section> <!-- #content-->
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