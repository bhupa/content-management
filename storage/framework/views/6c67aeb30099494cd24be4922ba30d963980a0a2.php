<?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(asset('backend/js/uploaders/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/uploaders/dropzoneDemo.js')); ?>"></script>

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
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Roomlist Images</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Roomlist Images</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Upload Images</h5>
            <div class="heading-elements">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['room-list', 'add'])): ?>
                <a href="<?php echo e(route('admin.roomlist-image.index',[$roomlist->id])); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
                    <?php endif; ?>
            </div>
        </div>
        <div class="panel-body">


            <div class="form-group">

                <div class="col-lg-12">
                    <form action="<?php echo e(route('admin.roomlist-image.store',[$roomlist->id])); ?>" class="dropzone" id="dropzone_accepted_files">


                        <?php echo e(csrf_field()); ?>

                    </form>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>