@extends('layouts.admin.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/tablednd.css') }}">
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="{{ asset('backend/tablednd.js') }}"></script>

@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Job Application Details</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Job Application Details</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Job Application Details</h5>
            <div class="heading-elements">
                {{--@can('master-policy.perform', ['career', 'add'])--}}
                {{--<a href="{{ route('admin.careers.create') }}" class="btn btn-default legitRipple pull-right">--}}
                {{--<i class="icon-file-plus position-left"></i>--}}
                {{--Create New--}}
                {{--<span class="legitRipple-ripple"></span>--}}
                {{--</a>--}}
                {{--@endif--}}
            </div>
        </div>
        <div class="panel-body">
            <strong>Position:</strong>{{$application->career->position}}<br/>
            <strong>Name:</strong>{{$application->name}}<br/>
            <strong>Email:</strong>{{$application->email}}<br/>
            <strong>Phone:</strong>{{$application->phone}}<br/>
              <a href="{{asset('/'.$application->file)}}" class="btn btn-info legitRipple ">
              CV
              </a><br/></br>
            <a href="{{asset('/'.$application->cover_letter)}}" class="btn btn-success legitRipple ">
                Cover letter
            </a>

        </div>
        {{----}}
    </div>
@endsection