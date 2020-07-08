@extends('layouts.admin.app')
@section('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
    <script>
        $(document).ready(function () {


        });
    </script>
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Dashboard</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-lg-8">

            <!-- Marketing campaigns -->
{{--            <div class="panel panel-flat">--}}
{{--                <div class="panel-heading">--}}
{{--                    <h6 class="panel-title">Marketing campaigns</h6>--}}
{{--                    <div class="heading-elements">--}}
{{--                        <span class="label bg-success heading-text">28 active</span>--}}
{{--                        <ul class="icons-list">--}}
{{--                            <li class="dropdown">--}}
{{--                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i--}}
{{--                                            class="icon-menu7"></i> <span class="caret"></span></a>--}}
{{--                                <ul class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <li><a href="#"><i class="icon-sync"></i> Update data</a></li>--}}
{{--                                    <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>--}}
{{--                                    <li class="divider"></li>--}}
{{--                                    <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-lg text-nowrap">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td class="col-md-5">--}}
{{--                                <div class="media-left">--}}
{{--                                    <div id="campaigns-donut"></div>--}}
{{--                                </div>--}}

{{--                                <div class="media-left">--}}
{{--                                    <h5 class="text-semibold no-margin">Left Balance--}}
{{--                                        <small class="text-success text-size-base"><i--}}
{{--                                                    class="icon-arrow-up12"></i>  Rs.120--}}
{{--                                        </small>--}}
{{--                                    </h5>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td class="col-md-5">--}}
{{--                                <div class="media-left">--}}
{{--                                    <div id="campaign-status-pie"></div>--}}
{{--                                </div>--}}

{{--                                <div class="media-left">--}}
{{--                                    <h5 class="text-semibold no-margin">Left Sms--}}
{{--                                        <small class="text-danger text-size-base"><i--}}
{{--                                                    class="icon-arrow-down12"></i>  100--}}
{{--                                        </small>--}}
{{--                                    </h5>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td class="text-right col-md-2">--}}
{{--                                <a href="#" class="btn bg-indigo-300"><i--}}
{{--                                            class="icon-statistics position-left"></i> View report</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

    </div>
    <!-- /dashboard content -->
@endsection