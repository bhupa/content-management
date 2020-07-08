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
                <li class="active">Edit Content</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Content</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.contents.index') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => ['admin.contents.update', $content->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')) !!}
            <fieldset class="content-group">
                <div class="clearfix"></div>
                <br>
                @if($content->edit == 0)
                <div class="form-group">
                    <label class="control-label col-lg-2">Parent<span class="text-danger">*</span></label>
                    <div class="col-lg-6">

                        <select name="parent_id" class="form-control">
                            <option value="" {{ ($content->parent_id == NULL) ? "selected" : "" }}>Parent Itself</option>
                            @include('admin.content.recursive_options', ['parents' => $parents, 'selected_id' => $content->parent_id])
                        </select>

                    </div>
                </div>
                <br>
                <div class="clearfix"></div>
                @endif
                <div class="form-group">
                    <label class="control-label col-lg-2">Header</label>
                    <div class="col-lg-10">
                        <input type="checkbox" name="header" <?php if($content->header ==true)  echo 'checked'; ?>>
                    </div>
                </div>
                <div class="clearfix"></div> <div class="form-group">
                    <label class="control-label col-lg-2">Footer</label>
                    <div class="col-lg-10">
                        <input type="checkbox" name="footer" <?php if($content->footer ==true)  echo 'checked'; ?>>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Editable ?</label>
                    <div class="col-lg-10">
                        <input type="checkbox" name="edit" <?php if($content->edit ==true)  echo "checked"; ?>>
                    </div>
                </div>
                <div class="clearfix"></div>
                @if($content->edit == 0)
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::text('title', $content->title ?? "", array('class'=>'form-control','placeholder'=>'Post title')) !!}
                    </div>
                </div>
                @endif
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">

                        @if(file_exists('storage/'.$content->image) && $content->image != '')
                            <img src="{{ asset('storage/'.$content->image) }}" class="displayimage" style="width:200px; height:200px;" alt="">
                        @endif

                        <input name="image" type="hidden" class="fileimage">
                        <div id="form1" runat="server">
                            <input type='file' id="imgInp" /></br> </br>
                            <img id="my-image" src="#" />
                        </div>
                        <input type="button" class="use" value="Crop" >
                        <input type="button" class="cancle-btn" value="Delete" ></br> </br>
                        <div class="result"></div>
                    </div>


                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Meta Keys <span class="text-danger"></span></label>

                    <div class="col-lg-6">
                        {!! Form::text('meta_keys', $content->meta_keys ?? "", array('class'=>'form-control','placeholder'=>'Meta Keys')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Meta Description <span class="text-danger"></span></label>

                    <div class="col-lg-6">
                        {!! Form::text('meta_desc', $content->meta_desc ?? "", array('class'=>'form-control','placeholder'=>'Meta Description')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group row {{ $errors->has('short_description') ? 'has-errors'  : ''}}">
                    <label class="control-label col-lg-2">Short Description </label>

                    <div class="col-lg-10">
                        {!! Form::textarea('short_description', $content->short_description, array('class'=>'form-control mini-editor','id'=>'editor', )) !!}
                        @if($errors->has('short_description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('short_description')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        {!! Form::textarea('description', $content->description ?? "", array('class'=>'form-control editor')) !!}
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        {!! Form::checkbox('is_active',null, $content->is_active) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Update <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            {!! method_field('PATCH') !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection