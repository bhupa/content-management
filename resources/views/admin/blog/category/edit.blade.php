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
                    Blog Category</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Blog Category</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Blog Category</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.blog.category.create') }}"
                   class="btn btn-default legitRipple pull-left">
                    <i class="icon-file-plus position-left"></i>
                    Create New
                    <span class="legitRipple-ripple"></span>
                </a>
                <a href="{{ route('admin.blog.category.index') }}" class="btn btn-default "
                   style="">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>&nbsp;
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => ['admin.blog.category.update',$category->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')) !!}
            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::text('name', $category->name, array('class'=>'form-control','placeholder'=>'Category Name')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                {{--<div class="form-group">--}}
                    {{--<label class="control-label col-lg-2">Image</label>--}}
                    {{--<div class="col-lg-10">--}}
                        {{--<a href="/file-manager?type=Images" id="feature-img-container">--}}
                            {{--<img @if(!empty($category->image)) title="Change Image" src="{{ asset($category->image) }}"--}}
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
                        {{--{!! Form::textarea('description', $category->description, array('class'=>'form-control editor')) !!}--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        {!! Form::checkbox('is_active', 1, $category->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            {!! method_field('PATCH') !!}
            {!! Form::hidden('id', $category->id)!!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection