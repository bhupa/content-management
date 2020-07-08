@extends('layouts.admin.app')
@section('scripts')
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
                    Gallery</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Gallery</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Gallery</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => 'admin.video.store','class'=>'form-horizontal','id'=>'validator', 'files' => 'true')) !!}
            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::text('title', null, array('class'=>'form-control','placeholder'=>'Title')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Link <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        {!! Form::text('link', null, array('class'=>'form-control', 'placeholder'=>'Link')) !!}
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
            <input type="hidden" name="gallery_id" value="{{$id}}">
            {{ csrf_field() }}
            {!! Form::close() !!}

        </div>
    </div>
@endsection