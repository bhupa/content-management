@extends('layouts.admin.app')
@section('scripts')
    <script>
        $(document).ready(function(){
//            function readURL(input) {
//                if (input.files && input.files[0]) {
//                    var reader = new FileReader();
//                    reader.onload = function(e) {
//                        $('#my-image').attr('src', e.target.result);
//                        var resize = new Croppie($('#my-image')[0], {
//                            viewport: { width: 600, height: 300 },
//                            boundary: { width: 800, height: 400 },
//                            showZoomer: true,
//                            enableResize: false,
//                            enableOrientation: true,
//
//                            enableExif: false,
//                        });
//                        $('.use').fadeIn();
//
//                        $('.use').on('click', function() {
//
//                            resize.result({type: 'canvas', size: { width:2500,height:1250}}).then(function(dataImg) {
//
//                                var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];
//
//                                // use ajax to send data to php
//
//                                $('.result').empty();
//                                $('.result').append('<img src="'+dataImg+'" style="width:200px; height:200px">');
//                                $('.fileimage').val(dataImg);
//
//                            });
//
//                        })
//
//
//                    }
//                    reader.readAsDataURL(input.files[0]);
//                }
//            }
//
//            $("#imgInp").change(function() {
//                readURL(this);
//            });
        });
    </script>
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Post</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Post</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Post</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.blog.index') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => 'admin.blog.store','class'=>'form-horizontal','id'=>'validator', 'files' => 'true')) !!}
            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::text('title', null, array('class'=>'form-control','placeholder'=>'Post title')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Category <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <select name="category_id" id="" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($category as $cat)

                                <option value="{{$cat->id}}" @if(old('category_id') == $cat->id) selected @endif  >{{$cat->name}}</option>
                                @endforeach
                        </select>
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