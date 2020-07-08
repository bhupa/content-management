<?php $__env->startSection('scripts'); ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#my-image').attr('src', e.target.result);
                    var resize = new Croppie($('#my-image')[0], {
                        viewport: { width: 300, height: 300 },
                        boundary: { width: 500, height: 500 },
                        showZoomer: true,
                        enableResize: false,
                        enableOrientation: false,
                        format:'jpeg'

                    });

                    $('.use').fadeIn();
                    $('.use').on('click', function() {

                        resize.result({type: 'canvas', size: { width:300,height:300}}).then(function(dataImg) {
                            var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];

                            // use ajax to send data to php

                            $('.result').empty();
                            $('.result').append('<img src="'+dataImg+'" style="width:200px; height:200px"    >');
                            $('.fileimage').val(dataImg);


                        });

                    })
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

        onload = function()
        {
            var itemText = $('#select  option:selected').val();
            select_drop(itemText);
            debugger
        };



        function select_drop(itemText){

            if (itemText == '1') {
                $('#text').css("display", "none");
                $('#image').css("display", "none");
                $('#link').css("display", "block");
            }else if(itemText == '3'){
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
                }else if(itemText == 'Image'){
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

                }else if(itemText == 'Image'){
                    $('#text').remove();
                    $('#link').remove();
                } else {
                    $('#link').remove();
                    $('#image').remove();

                }
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
                <li class="active"> Setting</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Setting</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.setting.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => ['admin.setting.update',$setting->id],'class'=>'form-horizontal','id'=>'articleForm', 'files' => 'true')); ?>

            <fieldset class="content-group">

                <div class="form-group">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        <?php echo Form::text('name',  $setting->name, array('class'=>'form-control','placeholder'=>'Name')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Slug <span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        <?php echo Form::text('slug',  $setting->slug, array('class'=>'form-control','placeholder'=>'Name')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Type <span class="text-danger"></span></label>


                    <div class="col-lg-10">
                        <?php echo Form::select('type', $type, $setting->type, array('class'=>'form-control','id' =>'select','placeholder'=>'Types')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group fg-line" id="link">
                    <label class="control-label col-lg-2" for="exampleInputEmail2">Link *</label>
                    <div class="col-lg-10">
                        <?php if($setting->type == '1'): ?>
                            <input type="text" class="form-control input-sm" name="url" id=""
                                   placeholder="Enter Link" value="<?php echo e($setting->value); ?>">
                        <?php else: ?>
                            <input type="text" class="form-control input-sm" name="url" id=""
                                   placeholder="Enter Link" value="">
                        <?php endif; ?>
                    </div>
                </div>



                <div class="form-group fg-line" id="text">
                    <label  class="control-label col-lg-2">text *</label>
                    <div class="col-lg-10">
                        <?php if($setting->type == '2'): ?>
                            <input type="text" class="form-control input-sm" name="url" id=""
                                   placeholder="Enter Text" value="<?php echo e($setting->value); ?>">
                        <?php else: ?>
                            <input type="text" class="form-control input-sm" name="url" id=""
                                   placeholder="Enter Text" value="">
                        <?php endif; ?>

                    </div>
                </div>
                <div id="image">
                    <div class="form-group fg-line" >
                        <label  class="control-label col-lg-2">Image *</label>
                        <div class="col-lg-10">
                            <?php if($setting->type == '3'): ?>
                                <?php if(file_exists('storage/'.$setting->value) && $setting->value !== ''): ?>
                                    <img src="<?php echo e(asset('storage/'.$setting->value)); ?>" class="displayimage" style="width:100px; height:100px; margin-bottom: 15px;" alt=""></br>

                                <?php endif; ?>
                                <input name="image" type="hidden" class="fileimage">
                                <div id="form1" runat="server">
                                    <input type='file' id="imgInp" /></br> </br>
                                    <img id="my-image" src="#" />
                                </div>
                                
                                <input type="button" class="use" value="Crop" ></br> </br>
                                <div class="result"></div>
                            <?php else: ?>
                                <input name="image" type="hidden" class="fileimage">
                                <div id="form1" runat="server">
                                    <input type='file' id="imgInp" /></br> </br>
                                    <img id="my-image" src="#" />
                                </div>
                                
                                <input type="button" class="use" value="Crop" ></br> </br>
                                <div class="result"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <?php echo Form::textarea('description', $setting->description, array('class'=>'form-control editor', 'id'=>'editor', 'required' => 'true')); ?>


                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active', null, $setting->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Update <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $setting->id); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>