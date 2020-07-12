@extends('layouts.admin.app')


@section('scripts')
    <script>


        $(window).load(function() {

            var itemText = $('#select  option:selected').text();

            select_drop(itemText);
        });



        function select_drop(itemText){

            if (itemText == 'Link') {
                $('#text').css("display", "none");
                $('#image').css("display", "none");
                $('#link').css("display", "block");
            }else if(itemText == 'image'){
                $('#text').css("display", "none");
                $('#image').css("display", "block");
                $('#link').css("display", "none");
            } else {
                $('#link').css("display", "none");
                $('#text').css("display", "block");
                $('#image').css("display", "none");
            }
        }
        $(function() {
            $('#select').on('change', function () {

                var itemText = $(this).find('option:selected').text();
                if (itemText == 'Link') {
                    $('#text').css("display", "none");
                    $('#image').css("display", "none");
                    $('#link').css("display", "block");
                }else if(itemText == 'image'){
                    $('#text').css("display", "none");
                    $('#image').css("display", "block");
                    $('#link').css("display", "none");
                } else {
                    $('#link').css("display", "none");
                    $('#text').css("display", "block");
                    $('#image').css("display", "none");
                }
            });
            $('#articleForm').submit(function () {
                var itemText = $('#select').find('option:selected').text();
                if (itemText == 'Link') {
                    $('#text').remove();
                    $('#image').remove();

                }else if(itemText == 'image'){
                    $('#text').remove();
                    $('#link').remove();
                } else {
                    $('#link').remove();
                    $('#image').remove();

                }
            });
        });
    </script>
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Setting</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active"> Setting</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Setting</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.setting.index') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::open(array('route' => ['admin.setting.update',$setting->id],'class'=>'form-horizontal','id'=>'articleForm', 'files' => 'true')) !!}
            <fieldset class="content-group">

                <div class="form-group">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        {!! Form::text('name',  $setting->name, array('class'=>'form-control','placeholder'=>'Name')) !!}
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Type <span class="text-danger"></span></label>


                    <div class="col-lg-10">

                        <select name="type" class="form-control" id="select">
                            
                            @foreach($type as $key)
                                <option value="{{$key}}" @if($key == $setting->type) selected @endif>{{$key}}</option>
                            @endforeach
                        </select>
                        {{--{!! Form::select('type', $type, $setting->type, array('class'=>'form-control','id' =>'select','placeholder'=>'Types')) !!}--}}
                    </div>
                </div>
                <div class="clearfix"></div>


                <div class="form-group fg-line" id="link">
                    <label class="control-label col-lg-2" for="exampleInputEmail2">Link *</label>
                    <div class="col-lg-10">
                        @if($setting->type == 'Link')
                            <input type="text" class="form-control input-sm" name="url" id=""
                                   placeholder="Enter Link" value="{{$setting->value}}">
                        @else
                            <input type="text" class="form-control input-sm" name="url" id=""
                                   placeholder="Enter Link" value="">
                        @endif
                    </div>
                </div>



                <div class="form-group fg-line" id="text">
                    <label  class="control-label col-lg-2">text *</label>
                    <div class="col-lg-10">
                        @if($setting->type == 'text')
                            <input type="text" class="form-control input-sm" name="url" id=""
                                   placeholder="Enter Text" value="{{$setting->value}}">
                        @else
                            <input type="text" class="form-control input-sm" name="url" id=""
                                   placeholder="Enter Text" value="">
                        @endif

                    </div>
                </div>

                <div id="image">
                    <div class="form-group fg-line" >
                        <label class="control-label col-lg-2">Image</label>
                        <div class="col-lg-5">
                            <input type="file" id="upload-file" accept="image/*"  name="image"/>
                        </div>
                        <div class="col-lg-5">
                            <div id="thumbnail"></div>
                            @if(file_exists('storage/'.$setting->value) && $setting->value !== '')
                                <img src="{{ asset('storage/'.$setting->value)}}" class="displayimage" style="width:100px; height:100px; margin-bottom: 15px;" alt=""></br>

                            @endif
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        {!! Form::checkbox('is_active', null, $setting->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Update <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            {!! method_field('PATCH') !!}
            {!! Form::hidden('id', $setting->id)!!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection