<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).ready(function(){
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#my-image').attr('src', e.target.result);
                        var resize = new Croppie($('#my-image')[0], {
                            viewport: { width: 600, height: 400 },
                            boundary: { width: 800, height: 600 },
                            showZoomer: true,
                            enableResize: false,
                            enableOrientation: false,
                            format:'jpeg'

                        });

                        $('.use').fadeIn();
                        $('.use').on('click', function() {

                            //resize.result('base64').then(function(dataImg) 
							resize.result({type: 'canvas', size: { width:300,height:300}}).then(function(dataImg)
							{
                                var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];

                                // use ajax to send data to php

                                $('.result').empty();
                                $('.result').append('<img src="'+dataImg+'" style="width:200px; height:200px"    >');
                                $('.fileimage').val(dataImg);
                                $('.displayimage').css('display','none');


                            });

                        })
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Members</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Members</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Gallery</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.members.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => 'admin.members.store','class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('name', null, array('class'=>'form-control','placeholder'=>'Name')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Contact <span class="text-danger">*</span></label>

                    <div class="col-lg-10">

                        <?php echo Form::textarea('contact', null, array('class'=>'form-control mini-editor','placeholder'=>'Meta Keys')); ?>


                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
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

                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Member Type <span class="text-danger">*</span></label>
                     <?php
                     $membertype = [];
                     ?>
                     <?php $__currentLoopData = $membertypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $membertype[$member->id] = $member->name ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-10">
                        <?php echo Form::select('member_type_id',$membertype, null, array('class'=>'form-control','placeholder'=>'Please select Member Types')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php echo Form::textarea('description', null, array('class'=>'form-control editor')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

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
            <?php echo e(csrf_field()); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>