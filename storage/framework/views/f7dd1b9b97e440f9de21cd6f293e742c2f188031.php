<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                Service-Category</h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
            </li>
            <li class="active">Service</li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Servie-Category</h5>
        <div class="heading-elements">
            <a href="<?php echo e(route('admin.service-categories.index')); ?>" class="btn btn-default legitRipple pull-right">
                <i class="icon-undo2 position-left"></i>
                Back
                <span class="legitRipple-ripple"></span>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <?php echo Form::open(array('route' => ['admin.service-categories.update',$servicecategory->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

        <fieldset class="content-group">

            <div class="clearfix"></div>
            <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                <div class="col-lg-6 ">
                    <?php echo Form::text('title', $servicecategory->title, array('class'=>'form-control','placeholder'=>'Title')); ?>

                </div>
                <?php if($errors->has('title')): ?>
                <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Publish ?</label>
                <div class="col-lg-10">
                    <?php echo Form::checkbox('is_active', null, $servicecategory->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>


                </div>
            </div>
            <div class="clearfix"></div>
        </fieldset>
        <div class="text-left col-lg-offset-2">
            <button type="submit" class="btn btn-primary legitRipple">
                Submit <i class="icon-arrow-right14 position-right"></i></button>
        </div>
        <?php echo method_field('PATCH'); ?>

        <?php echo Form::hidden('id', $servicecategory->id); ?>

        <?php echo Form::close(); ?>

    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>