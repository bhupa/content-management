@extends('layouts.app')
@section('title', 'Search')
@section('header_js')
@endsection
@section('main')
    <style>
        .gsc-selected-option {width: 100px;}
    </style>
    
    <!-- .custom-header -->
    <div id="content" class="site-content global-layout-right-sidebar">
        <div class="container">
            <div class="inner-wrapper">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                    <h1 class="page-title">Search</h1>
                        <script>
                          (function() {
                            var cx = '004184895998473855276:1euzcxgbcse';
                            var gcse = document.createElement('script');
                            gcse.type = 'text/javascript';
                            gcse.async = true;
                            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(gcse, s);
                          })();
                        </script>
                        <gcse:searchresults-only></gcse:searchresults-only>

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