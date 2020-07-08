<div class="footer text-muted">
    &copy; {{ date('Y') }}. <a href="{{route('home')}}" target="_blank"> {!! config('app.name') !!} </a> by <a
            href="http://peacenepal.com.np/" target="_blank">Peace Nepal DOT Com P. Ltd.</a>
    || Ver <a href="#"> {{ exec('git describe --tags --abbrev=1') }}</a>
</div>