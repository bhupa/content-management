<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Image Resize</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Image Resize</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Image Resize</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.imageresize.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => ['admin.imageresize.update', $imageresize->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

            <fieldset class="content-group">

                <div class="form-group">
                    <label class="control-label col-lg-2">Module Name<span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        <?php echo Form::text('title', $imageresize->title, array('class'=>'form-control','placeholder'=>'Module Name')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>


                 <div class="form-group">
                    <label class="control-label col-lg-2">Alias Name <span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        <?php echo Form::text('alias', $imageresize->alias, array('class'=>'form-control','placeholder'=>'Alias Name')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>


                
                    

                    
                     
                   
                
                


                 
                  

                 
                       
                    
                 
                


                 
                    

                    
                      
                  
                 
               


                 
                    

                   
                     
                   
               
               


                 <div class="form-group">
                    <label class="control-label col-lg-2">Image Resize Width</label>

                    <div class="col-lg-3">
                        <?php echo Form::text('image_resize_width', $imageresize->image_resize_width, array('class'=>'form-control','placeholder'=>'Image Resize Width')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Image Resize Height</label>

                    <div class="col-lg-3">
                        <?php echo Form::text('image_resize_height',$imageresize->image_resize_height, array('class'=>'form-control','placeholder'=>'Image Resize Height')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
              
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $imageresize->id); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>