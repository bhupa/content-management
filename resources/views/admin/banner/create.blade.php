@extends('layouts.admin.app')
@section('scripts')
  
@endsection

@section('page-header')

    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Banners</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Banners</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Banner</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.banner.index') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => 'admin.banner.store','class'=>'form-horizontal','id'=>'validator', 'files' => 'true')) !!}
            <fieldset class="content-group">
              
                <div class="clearfix"></div>
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6 ">
                        {!! Form::text('title', null, array('class'=>'form-control','placeholder'=>'Title')) !!}
                    </div>
                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="clearfix"></div>
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>

                    <div class="col-lg-6 ">
                        {!! Form::text('description', null, array('class'=>'form-control ', 'placeholder'=>'Description')) !!}

                    </div>
                    @if ($errors->has('description'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="clearfix"></div>
             

                <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">

                        <input name="image" type="hidden" class="fileimage">

                        <div id="form1" runat="server">
                            <input type='file' id="imgInp" placeholder="Upload Image"/> </br> </br>
                            <img id="my-image" src="#" />
                        </div>
                        {{--<button class="use">Upload</button>--}}
                        <input type="button" class="use" value="Crop" > 
                        <input type="button" class="cancle-btn" value="Delete" ></br> </br>
                        <div class="result"></div>
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

