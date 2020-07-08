<div id="sidebar-primary" class="sidebar widget-area" >
    <div class="sidebar-widget-wrapper">
        <aside class="widget recent-posts-widget">
            <h3 class="widget-title"><span class="widget-title-wrapper">Latest News</span><a class="more-link viewall sidelink" href="{{route('news.index')}}">View All</a></h3>
            @foreach($news as $new)
                <div class="recent-post-item">
                    @if(file_exists('storage/'.$new->image) && $new->image !== '')
                        <img class="alignleft" src="{{asset('storage/'.$new->image)}}" alt="{{$new->title}}" />
                    @endif
                    {{--<img class="alignleft" src="images/recent-post/recent-post-1.jpg" alt="Recent Post">--}}
                    <h4><a href="{{route('news.show',[$new->slug])}}" >{{str_limit($new->title,'50','....')}}</a></h4>
                    <p>{{$new->published_date->format('M d Y')}}</p>
                </div>
                @endforeach

        </aside>
        <aside class="widget widget-recent-entries">
            <h3 class="widget-title">Gallery <a class="more-link viewall sidelink" href="{{route('gallery.index')}}">View All</a></h3>
            <ul class="side-gallery">
                @foreach($galleries as $gallerie)
                    <li>
                        <a href="{{route('gallery.show',[$gallerie->slug])}}">
                            @if(file_exists('storage/'.$gallerie->image) && $gallerie->image != '')
                                <img alt="{{$gallerie->title}}" src="{{asset('storage/'.$gallerie->image)}}">
                            @endif
                        </a>
                    </li>
                    @endforeach
            </ul>
        </aside>
        <!-- .widget-recent-entries -->

    </div>
    <!-- .sidebar-widget-wrapper -->
</div>