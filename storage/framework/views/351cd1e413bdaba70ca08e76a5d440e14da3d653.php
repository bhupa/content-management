<?php $__env->startSection('scripts'); ?>
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Banner</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Banner</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Banner</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.banner.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => ['admin.banner.update', $banner->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

            <fieldset class="content-group">

                <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6 ">
                        <?php echo Form::text('title', $banner->title, array('class'=>'form-control','placeholder'=>'Title')); ?>

                    </div>
                    <?php if($errors->has('title')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>

              
              


                <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-5">
                        <input type="file" id="upload-file" accept="image/*"  name="image"/>
                    </div>
                    <div class="col-lg-5">
                        <div id="thumbnail"></div>
                    <?php if(file_exists('storage/'.$banner->image) && $banner->image !== ''): ?>
                        <img src="<?php echo e(asset('storage/'.$banner->image)); ?>" class="displayimage" style="width:100px; height:100px; margin-bottom: 15px;" alt=""></br>

                    <?php endif; ?>
                    </div>


                </div>
                <div class="form-group row <?php echo e($errors->has('short_description') ? 'has-errors'  : ''); ?>">
                    <label class="control-label col-lg-2">Short Description </label>

                    <div class="col-lg-10">
                        <?php echo Form::textarea('short_description', $banner->short_description, array('class'=>'form-control mini-editor','id'=>'editor', )); ?>

                        <?php if($errors->has('short_description')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('short_description')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group mt-2">
                        <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <?php echo Form::textarea('description', $banner->description, array('class'=>'form-control editor', 'id'=>'editor', 'required' => 'true')); ?>

                            <?php if($errors->has('description')): ?>
                                <span class="help-block">
                                <strong><?php echo e($errors->first('description')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                <div class="clearfix"></div>


                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active', null, $banner->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $banner->id); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>