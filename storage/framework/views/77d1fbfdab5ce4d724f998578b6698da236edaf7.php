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
                    Event</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Event</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Event</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.event.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => ['admin.event.update',$event->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('title', $event->title, array('class'=>'form-control','placeholder'=>'Post title')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Location <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('location', $event->location, array('class'=>'form-control','placeholder'=>'Event Location')); ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Date <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="date" id="event-date" value="<?php echo e($event->date); ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-5">
                        <input type="file" id="upload-file" accept="image/*"  name="image"/>
                    </div>
                    <div class="col-lg-5">
                        <div id="thumbnail"></div>
                        <?php if(file_exists('storage/'.$event->image) && $event->image !== ''): ?>
                            <img src="<?php echo e(asset('storage/'.$event->image)); ?>" class="displayimage" style="width:100px; height:100px; margin-bottom: 15px;" alt=""></br>

                        <?php endif; ?>
                    </div>


                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Short  Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php echo Form::textarea('short_description', $event->short_description, array('class'=>'form-control editor')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php echo Form::textarea('description', $event->description, array('class'=>'form-control editor')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active',null, $event->is_active); ?>


                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $event->id); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>