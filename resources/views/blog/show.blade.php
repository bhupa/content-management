@extends('layouts.app')
@section('title', $blog->title)
@section('header_js')
@endsection
@section('main')

    
    <!-- .custom-header -->
    <div id="content" class="site-content global-layout-right-sidebar">
        <div class="container">
            <div class="inner-wrapper">
                <div id="primary" class="content-area">
                    <h1 class="page-title">{{$blog->title}}</h1>
                    <main id="main" class="site-main">

                        @if(file_exists('storage/'.$blog->image) && $blog->image !== '')
                            
                            <div class="contentimg"><img src="{{asset('storage/'.$blog->image)}}" alt="" data-action="zoom"></div>
                        @endif
                        {!! $blog->description !!}
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            @include('frontend.inc.sidebar')
            <!-- .sidebar -->
            </div>
            <!-- #inner-wrapper -->
        </div>
        <!-- .container -->
    </div>
    <!-- .site-header -->


@endsection

@section('scripts')


    <script type="text/javascript">

    </script>
@endsection