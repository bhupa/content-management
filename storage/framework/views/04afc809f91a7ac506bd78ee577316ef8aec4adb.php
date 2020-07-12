<?php $__env->startSection('scripts'); ?>
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
//                                resize.result({type: 'canvas', size: { width:790,height:468}}).then(function(dataImg) {
//                                var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];
//
//                                // use ajax to send data to php
//
//                                $('.result').empty();
//                                $('.result').append('<img src="'+dataImg+'" style="width:200px; height:200px">');
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Member</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Member</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Member</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.member.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => 'admin.member.store','class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('name', null, array('class'=>'form-control','placeholder'=>'Member Name')); ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Member Type<span class="text-danger">*</span></label>
                    <div class="col-lg-6">

                        <select name="type" class="form-control">
                            <option value="">Select Member Type</option>
                            <option value="Executive" <?php if(old('type') == 'Executive'): ?> selected  <?php endif; ?>>Executive</option>
                            <option value="Member" <?php if(old('type') == 'Member'): ?> selected  <?php endif; ?>>Member</option>
                        </select>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-lg-2">Position<span class="text-danger">*</span></label>
                    <div class="col-lg-6">

                        <select name="member_type_id" class="form-control">
                            <option value="">Select Position</option>

                            <?php $__currentLoopData = $membertypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($position->id); ?>" <?php if(old('member_type_id') == $position->id): ?> selected  <?php endif; ?>><?php echo e($position->name); ?></option>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-lg-2">Location <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('address', null, array('class'=>'form-control','placeholder'=>'Member Address')); ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Facebook</label>

                    <div class="col-lg-6">
                        <?php echo Form::url('facebook', null, array('class'=>'form-control','placeholder'=>'Facebook Link ')); ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Twitter</label>

                    <div class="col-lg-6">
                        <?php echo Form::url('twitter', null, array('class'=>'form-control','placeholder'=>'Twitter Link ')); ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Linkedin</label>

                    <div class="col-lg-6">
                        <?php echo Form::url('linkedin', null, array('class'=>'form-control','placeholder'=>'Linkedin Link ')); ?>

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