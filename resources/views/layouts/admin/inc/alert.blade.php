@if (session('status'))
    <div class="alert alert-success    no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-check"></i> Success:</h4>
        {!! session('status') !!}
    </div>
@endif


@if(Session::has('flash_success'))
    <div class="alert alert-success  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-check"></i> Success:</h4>
        {!! Session::get('flash_success')  !!}
    </div>
@endif

@if(Session::has('flash_notice'))
    <div class="alert alert-success  no-border">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success:</h4>
        {!!  Session::get('flash_notice')  !!}
    </div>
@endif

@if (Session::has('flash_error'))
    <div class="alert alert-danger  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <h4><i class="icon fa fa-warning"></i> Error!</h4>
        {!! Session::get('flash_error')  !!}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-ban"></i>Error(s):</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('flash_info'))
    <div class="alert alert-info  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-info"></i> Notice:</h4>
        {!!  Session::get('flash_info')  !!}
    </div>
@endif
