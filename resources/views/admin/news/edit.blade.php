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

        $(document).ready(function(){
//            function readURL(input) {
//                if (input.files && input.files[0]) {
//                    var reader = new FileReader();
//                    reader.onload = function(e) {
//                        $('#my-image').attr('src', e.target.result);
//                        var resize = new Croppie($('#my-image')[0], {
//                            viewport: { width: 600, height: 400 },
//                            boundary: { width: 800, height: 600 },
//                            showZoomer: true,
//                            enableResize: false,
//                            enableOrientation: false,
//                            format:'jpeg'
//
//                        });
//
//                        $('.use').fadeIn();
//                        $('.use').on('click', function() {
//
//                            resize.result({type: 'canvas', size: { width:790,height:468}}).then(function(dataImg) {
//
//                                var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];
//
//                                // use ajax to send data to php
//
//                                $('.result').empty();
//                                $('.result').append('<img src="'+dataImg+'" style="width:200px; height:200px"    >');
//                                $('.fileimage').val(dataImg);
//                                $('.displayimage').css('display','none');
//
//
//                            });
//
//                        })
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
                    News</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">News</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit News</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.news.index') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => ['admin.news.update', $news->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')) !!}
            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::text('title', $news->title ?? "", array('class'=>'form-control','placeholder'=>'Post title')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Meta Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::text('meta_title', $news->meta_title, array('class'=>'form-control','placeholder'=>'Post title')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Keywords <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::text('keywords', $news->keywords, array('class'=>'form-control','placeholder'=>'Post title')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Type <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <select name="type" class="form-control">
                            <option value="0">Select The Type</option>
                            <option value="1" <?php if($news->type == '1') { ?> selected="selected"<?php } ?>>News</option>
                            <option value="2" <?php if($news->type == '2') { ?> selected="selected"<?php } ?>>Event</option>
                            <option value="3" <?php if($news->type == '3') { ?> selected="selected"<?php } ?>>Notice</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">
                        @if(file_exists('storage/'.$news->image) && $news->image !== '')
                            <img src="{{ asset('storage/'.$news->image)}}" class="displayimage" style="width:100px; height:100px; margin-bottom: 15px;" alt=""></br>
                        @endif
                        <input name="image" type="hidden" class="fileimage">
                        <div id="form1" runat="server">
                            <input type='file' id="imgInp" /></br> </br>
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
                    <label class="control-label col-lg-2">Short  Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        {!! Form::textarea('short_description', $news->short_description ?? "", array('class'=>'form-control editor')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        {!! Form::textarea('description', $news->description ?? "", array('class'=>'form-control editor')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Published Date <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        {!! Form::date('published_date', $news->published_date, array('class'=>'form-control','placeholder'=>'Published Date')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        {!! Form::checkbox('is_active', null, $news->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            {!! method_field('PATCH') !!}
            {!! Form::hidden('id', $news->id)!!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection