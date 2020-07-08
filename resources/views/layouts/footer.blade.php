<footer class="site-footer">
  <div class="container">


    <div class="row">
      <div class="col-md-4">
        <h3 class="footer-heading mb-4 text-white">About</h3>
        <p>{!! str_limit($about->short_description,'200','....') !!} </p>
        <p><a href="{{route('about-us.index')}}" class="btn btn-primary pill text-white px-4">Read More</a></p>
      </div>
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-6">
            <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
            <ul class="list-unstyled">
                @foreach($latestcontents as $latestcontent)
              <li><a href="{{route('content.show',[$latestcontent->slug])}}">{{$latestcontent->title}}</a></li>
              @endforeach

            </ul>
          </div>
          <div class="col-md-6">
            <h3 class="footer-heading mb-4 text-white">&nbsp;</h3>
            <ul class="list-unstyled">
                @foreach($contentmenus as $contentmenu)
                    <li><a href="{{route('content.show',[$contentmenu->slug])}}">{{$contentmenu->title}}</a></li>
                @endforeach
            </ul>
          </div>
        </div>
      </div>


      <div class="col-md-3">
        <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Contact Information</h3></div>
        <div class="col-md-12">
          <p>
            @foreach($settings as $setting)

              @if($setting->name == 'Instagram')
                <a href="{{$setting->value}}" class="p-2"><span class="icon-instagram"></span></a>
              @endif
              @if($setting->name == 'Vimeo')
                <a href="{{$setting->value}}" class="p-2"><span class="icon-vimeo"></span></a>
              @endif
                @if($setting->name == 'Twitter')
                  <a href="{{$setting->value}}" class="p-2"><span class="icon-twitter"></span></a>
                @endif
              @if($setting->name == 'Facebook')
            <a href="{{$setting->value}}" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
              @endif

              @endforeach

          </p>
        </div>
      </div>
    </div>
    <div class="row  mt-5 text-center">
      <div class="col-md-12">


        Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved


      </div>

    </div>
  </div>
</footer>