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