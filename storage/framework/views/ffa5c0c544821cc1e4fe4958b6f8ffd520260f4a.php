<?php $__env->startSection('scripts'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.css" />
    <style>
        img {
            max-width: 100%; /* This rule is very important, please do not ignore this! */
        }


        #my-image, .use {
            display: none;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.js"></script>
    <script>
        $(document).ready(function(){

            onload = function()
            {
                var itemText = $('#select  option:selected').val();
                select_drop(itemText);
                debugger
            };



            function select_drop(itemText){

                if (itemText == 'Link') {
                    $('#text').css("display", "none");
                    $('#image').css("display", "none");
                    $('#link').css("display", "block");
                }else {
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

                    } else {
                        $('#link').remove();
                        $('#image').remove();

                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Setting</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Setting</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Setting</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.setting.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => 'admin.setting.store','class'=>'form-horizontal','id'=>'articleForm', 'files' => 'true')); ?>

            <fieldset class="content-group">

                <div class="form-group">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        <?php echo Form::text('name', null, array('class'=>'form-control','placeholder'=>'Name')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Slug <span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        <?php echo Form::text('slug', null, array('class'=>'form-control','placeholder'=>'Slug')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Type <span class="text-danger"></span></label>

                    <div class="col-lg-10">
                        <?php echo Form::select('type', $type, null, array('class'=>'form-control','id' =>'select','placeholder'=>'Types')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group fg-line" id="link">
                    <label class="control-label col-lg-2" for="exampleInputEmail2">Link *</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control input-sm" name="url" id=""
                               placeholder="Enter Link" value="<?php echo e(old('name')); ?>">
                    </div>
                </div>



                <div class="form-group fg-line" id="text">
                    <label  class="control-label col-lg-2">text *</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control input-sm" name="url" id=""
                               placeholder="Enter Text" value="<?php echo e(old('name')); ?>">
                    </div>
                </div>
                <div id="image">
                    <div class="form-group fg-line" >
                        <label  class="control-label col-lg-2">Image *</label>
                        <div class="col-lg-10">
                            <input name="image" type="hidden" class="fileimage">
                            <div id="form1" runat="server">
                                <input type='file' id="imgInp" /></br> </br>
                                <img id="my-image" src="#" />
                            </div>
                            
                            <input type="button" class="use" value="Crop" ></br> </br>
                            <div class="result"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>

                        <div class="col-lg-10">
                            <?php echo Form::textarea('description', null, array('class'=>'form-control editor', 'id'=>'editor', 'required' => 'true')); ?>


                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active', 1, true, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>