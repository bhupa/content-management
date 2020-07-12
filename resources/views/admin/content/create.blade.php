@extends('layouts.admin.app')
@section('styles')
  
@endsection

    @section('scripts')
   
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Content</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li>
                    <a href="{{ route('admin.contents.index') }}"><i class="icon-page-break position-left"></i> Contents</a>
                </li>
                <li class="active">Add Content</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Content</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.contents.index') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => 'admin.contents.store','class'=>'form-horizontal','id'=>'validator', 'files' => 'true')) !!}
            <fieldset class="content-group">
                <div class="clearfix"></div>
                <br>
                <div class="form-group">
                    <label class="control-label col-lg-2">Parent<span class="text-danger">*</span></label>
                    <div class="col-lg-6">

                        <select name="parent_id" class="form-control">
                            <option value="">Parent Itself</option>
                            @include('admin.content.recursive_options', ['parents' => $parents, 'selected_id' => ""])
                        </select>

                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="control-label col-lg-2">Display In<span class="text-danger">*</span></label>
                    <div class="col-lg-6">

                        <select name="display_in" class="form-control">
                            <option value="">Selecet Display In</option>
                            <option value="header" @if(old('display-in') == 'header') selected  @endif>Header</option>
                            <option value="content" @if(old('display-in') == 'content') selected  @endif>Content</option>
                            <option value="footer" @if(old('display-in') == 'footer') selected  @endif>Footer</option>
                        </select>

                    </div>
                </div>
                <br>

                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::text('title', null, array('class'=>'form-control','placeholder'=>'Post title')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-5">
                        <input type="file" id="upload-file" accept="image/*"  name="image"/>
                    </div>
                    <div class="col-lg-5">
                        <div id="thumbnail"></div>
                    </div>


                </div>

                <div class="clearfix"></div>
                <div class="form-group row {{ $errors->has('short_description') ? 'has-errors'  : ''}}">
                    <label class="control-label col-lg-2">Short Description </label>

                    <div class="col-lg-10">
                        {!! Form::textarea('short_description', null, array('class'=>'form-control mini-editor','id'=>'editor', )) !!}
                        @if($errors->has('short_description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('short_description')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                <div class="form-group mt-2">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        {!! Form::textarea('description', null, array('class'=>'form-control editor', 'id'=>'editor', 'required' => 'true')) !!}
                        @if($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description')}}</strong>
                            </span>
                        @endif
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
                    Submit <i class="icon-arrow-right14 position-right"></i>
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection