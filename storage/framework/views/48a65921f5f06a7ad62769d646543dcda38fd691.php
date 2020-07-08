<?php $__env->startSection('scripts'); ?>
   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Testimonials</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Testimonials</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Testimonials</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.testimonials.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => ['admin.testimonials.update',  $testimonial->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

            <fieldset class="content-group">
                <div class="clearfix"></div>
                <br>
                <div class="form-group <?php echo e($errors->has('name') ? 'has-error': ''); ?>">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        <?php echo Form::text('name', $testimonial->name, array('class'=>'form-control','placeholder'=>'Name')); ?>

                    </div>
                    <?php if($errors->has('name')): ?>
                        <sapn class="help-block">
                            <strong>
                                <?php echo e($errors->first('name')); ?>

                            </strong>
                        </sapn>
                    <?php endif; ?>
                </div>
                <br>
                <div class="clearfix"></div>

             
                     

                     
                    
               
               
                <div class="form-group <?php echo e($errors->has('description') ? 'has-error' :''); ?>">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php echo Form::textarea('description', $testimonial->description, array('class'=>'form-control editor', 'required' => 'true')); ?>

                        <?php if($errors->has('description')): ?>
                            <sapn class="help-block">
                                <strong>
                                    <?php echo e($errors->first('description')); ?>

                                </strong>
                            </sapn>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="clearfix"></div>

                <div class="form-group <?php echo e($errors->has('image') ? 'has-error':''); ?>">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">
                        <?php if(file_exists('storage/'.$testimonial->image) && $testimonial->image !== ''): ?>
                            <img src="<?php echo e(asset('storage/'.$testimonial->image)); ?>" class="displayimage" style="width:100px; height:100px; margin-bottom: 15px;" alt=""></br>

                        <?php endif; ?>

                        <input name="image" type="hidden" class="fileimage">
                        <div id="form1" runat="server">
                            <input type='file' id="imgInp" /></br> </br>
                            <img id="my-image" src="#" />
                        </div>
                        
                            <input type="button" class="use" value="Crop" >
                            <input type="button" class="cancle-btn" value="Delete" ></br> </br>
                            <div class="result"></div>
                            <?php if($errors->has('image')): ?>
                                <sapn class="help-block">
                                    <strong>
                                        <?php echo e($errors->first('image')); ?>

                                    </strong>
                                </sapn>
                            <?php endif; ?>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active',null,$testimonial->is_active ,array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $testimonial->id); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>