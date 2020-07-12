<div id="sidebar-primary" class="sidebar widget-area" >
    <div class="sidebar-widget-wrapper">
        <aside class="widget recent-posts-widget">
            <h3 class="widget-title"><span class="widget-title-wrapper">Our Events</span></h3>
            <div class="blogs-sider-bar">

                @foreach($events as $blogs)
                    <div class="row">
                        <div class="col-md-5">
                            @if(file_exists('storage/'.$blogs->image) && $blogs->image != '')
                                <a href="{{route('event.show',[$blogs->slug])}}">
                                    <img src="{{asset('storage/'.$blogs->image)}}" alt="{{$blogs->title}}" class="side-bar-image">
                                </a>
                            @endif
                        </div>

                        <div class="col-md-7">

                            <div class="side-bar">
                                <a href="{{route('event.show',[$blogs->slug])}}">
                                    <h4>{{str_limit($blogs->title,'50','.....')}}</h4>
                                    <p>{{ \Carbon\Carbon::parse($blogs->date)->toFormattedDateString() }}</p>

                                </a>

                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach


            </div>

        </aside>

        <!-- .widget-recent-entries -->

    </div>

    <div class="" style="display: block; margin:50px;"></div>
    <div class="sidebar-widget-wrapper">
    <aside class="widget recent-posts-widget">
        <h3 class="widget-title"><span class="widget-title-wrapper">Recent Post</span></h3>
        <div class="blogs-sider-bar">

            @foreach($sidebarblogs as $blogs)
                <div class="row">
                    <div class="col-md-5">
                        @if(file_exists('storage/'.$blogs->image) && $blogs->image != '')
                            <a href="{{route('blogs.show',[$blogs->slug])}}">
                                <img src="{{asset('storage/'.$blogs->image)}}" alt="{{$blogs->title}}" class="side-bar-image">
                            </a>
                        @endif
                    </div>

                    <div class="col-md-7">

                        <div class="side-bar">
                            <a href="{{route('blogs.show',[$blogs->slug])}}">
                                <h4>{{str_limit($blogs->title,'50','.....')}}</h4>
                                <p>{{ \Carbon\Carbon::parse($blogs->created_at)->toFormattedDateString() }}</p>

                            </a>

                        </div>
                    </div>
                </div>
                <hr>
            @endforeach


        </div>

    </aside>
    </div>
    <div class="" style="display: block; margin:50px;"></div>
    <!-- .sidebar-widget-wrapper -->
</div>