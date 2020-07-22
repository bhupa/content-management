<section class="home-blog home-team-section"  id="our-events">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2>Our Events</h2>
            </div>
        </div>
        <div class="row">
            @foreach($events as $event)
                <div class="col-12 col-md-6" id="event-height-div">
                    <div class="event">
                        <div class="event-img">
                            @if(file_exists('storage/'.$event->image) && $event->image != '')
                                <a href="{{route('event.show',[$event->slug])}}">
                                    <img src="{{asset('storage/'.$event->image)}}" alt="{{$event->title}}"  class="event-image">
                                </a>
                            @endif
                        </div>
                        <div class="event-content">
                            <h3><a href="{{route('event.show',[$event->slug])}}">{{ str_limit($event->title,'50','....')}}</a></h3>
                            <ul class="event-meta">
                                <li><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</li>
                                <li><i class="fa fa-map-marker"></i> {{$event->location}}</li>
                            </ul>
                            <p>
                                {!! str_limit($event->short_description,'150','.....') !!}
                                {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.--}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

</section>
