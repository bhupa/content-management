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
                        name: {
                            validators: {
                                notEmpty: {
                                    message: 'The name is required'
                                }
                            }
                        },
                        description: {
                            validators: {
                                notEmpty: {
                                    message: 'The description is required'
                                }
                            },
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
                    Member Type</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Member Type</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Member Type</h5>
            <div class="heading-elements">

                <a href="{{ route('admin.member-type.index') }}" class="btn btn-default "
                   style="">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>&nbsp;
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => ['admin.member-type.update',$memberType->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')) !!}
            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::text('name', $memberType->name, array('class'=>'form-control','placeholder'=>'memberType Name')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                {{--<div class="form-group">--}}
                {{--<label class="control-label col-lg-2">Image</label>--}}
                {{--<div class="col-lg-10">--}}
                {{--<a href="/file-manager?type=Images" id="feature-img-container">--}}
                {{--<img @if(!empty($memberType->image)) title="Change Image" src="{{ asset($memberType->image) }}"--}}
                {{--height="100"--}}
                {{--@else src="{{ asset('backend/images/if_document_image_add_103475.png') }}"--}}
                {{--title="Choose Image"--}}
                {{--@endif--}}
                {{-->--}}
                {{--</a>--}}
                {{--<input name="image" type="hidden" id="thumbnail">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
                {{--<div class="form-group">--}}
                {{--<label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>--}}
                {{--<div class="col-lg-10">--}}
                {{--{!! Form::textarea('description', $memberType->description, array('class'=>'form-control editor')) !!}--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        {!! Form::checkbox('is_active', 1, $memberType->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            {!! method_field('PATCH') !!}
            {!! Form::hidden('id', $memberType->id)!!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection