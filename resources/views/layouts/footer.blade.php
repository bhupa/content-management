
<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div class="row ">
      <div class="col-md-4">
        <h3>About Us</h3>
        <p class="mb-5">

          {!! str_limit($about->short_description,'200','...') !!}
        <ul class="list-unstyled footer-link d-flex footer-social">
          @foreach($settings as $setting)
            @if($setting->slug =='twitter')
          <li><a href="{{$setting->value}}" class="p-2"><span class="fa fa-twitter"></span></a></li>
            @endif
           @if($setting->slug =='facebook')
          <li><a href="{{$setting->value}}" class="p-2"><span class="fa fa-facebook"></span></a></li>
              @endif
             @if($setting->slug =='linkedin')
          <li><a href="{{$setting->value}}" class="p-2"><span class="fa fa-linkedin"></span></a></li>
                @endif
                  @if($setting->slug =='instagram')
          <li><a href="{{$setting->value}}" class="p-2"><span class="fa fa-instagram"></span></a></li>
              @endif
            @endforeach
        </ul>
      </div>
      <div class="col-md-3">
        <h3>Menu</h3>
        <ul class="list-unstyled footer-link">
          <li><a href="{{route('content.show',[$about->slug])}}">About Us</a></li>
          <li><a href="{{route('executive-committee.index')}}">Team</a></li>
          <li><a href="{{route('event.index')}}">Events</a></li>
          <li><a href="{{route('contact.index')}}">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h3>Links</h3>
        <ul class="list-unstyled footer-link">
          @foreach($footermenu as $menu)
          <li><a href="{{route('content.show',[$menu->slug])}}">{{$menu->title}}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-3">
        <h3>Contacts</h3>
        <ul class="list-unstyled footer-link">

          <li class="d-block">
            <span class="d-block">Address:</span>
            @foreach($settings as $setting)
            @if($setting->slug =='address')
            <span class="text-white">{{$setting->value}}</span>
            @endif
              @endforeach
          </li>
          <li class="d-block">
            <span class="d-block">Telephone:</span>
              @foreach($settings as $setting)
            @if($setting->slug =='contact')
            <span class="text-white">{{$setting->value}}</span>
            @endif
            @endforeach
          </li>
          <li class="d-block">
            <span class="d-block">Email:</span>
              @foreach($settings as $setting)
            @if($setting->slug =='email')
            <span class="text-white">{{$setting->value}}</span>

            @endif
            @endforeach
          </li>

        </ul>
      </div>
    </div>
    <p class="text-center">
        Copyright © {{date('Y')}} khassamaj Uk.  All rights reserved |  Developed By

        <a href="http://www.genstechnology.com/" target="_blank">Gens Technology</a></p>


  </div>
</footer>
