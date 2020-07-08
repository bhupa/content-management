@extends('layouts.admin.app')
@section('styles')
    <style>
        img {
            max-width: 100%; /* This rule is very important, please do not ignore this! */
        }

        #canvas {
            height: 180px;
            width: 265px;
            background-color: #ffffff;
            cursor: default;
            border: 1px solid black;
        }
        #my-image, .use {
            display: none;
        }
    </style>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#validator')
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        title: {
                            validators: {
                                notEmpty: {
                                    message: 'The title is required'
                                }
                            }
                        },
                        description: {
                            validators: {
                                notEmpty: {
                                    message: 'The description is required'
                                }
                            }
                        },

                    }
                })
        });
    </script>
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Messages</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Messages</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Messages</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.messages.index') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => 'admin.messages.store','class'=>'form-horizontal','id'=>'validator', 'files' => 'true')) !!}
            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        @php $members = [];@endphp
                        @foreach($chairperson as $key)
                            @php $members[$key->id]= $key->name @endphp
                        @endforeach
                        {{Form::select('team_id', $members, null,['class'=>'form-control', 'placeholder'=>'select the Chairperson','id'=>'select-category'])}}

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        {!! Form::textarea('description', null, array('class'=>'form-control editor')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>


                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        {!! Form::checkbox('is_active', 1, true, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection