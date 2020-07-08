<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Career</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Career</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Career</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.careers.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => ['admin.careers.update',$career->id],'class'=>'form-horizontal','id'=>'articleForm', 'files' => 'true')); ?>

            <fieldset class="content-group">

                <div class="form-group">
                    <label class="control-label col-lg-2">Position <span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        <?php echo Form::text('position', $career->position, array('class'=>'form-control','placeholder'=>'Position')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group " id="link">
                    <label class="control-label col-lg-2" for="exampleInputEmail2">Number *</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control " name="number" id=""
                               placeholder="Number of Jobs" value="<?php echo e($career->number); ?>">
                    </div>
                </div>



                <div class="form-group " id="text">
                    <label  class="control-label col-lg-2">Qualification *</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control " name="qualification" id=""
                               placeholder="Qualifaction" value="<?php echo e($career->qualification); ?>">
                    </div>
                </div>

                <div class="form-group " id="text">
                    <label  class="control-label col-lg-2">Experience *</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control " name="experience" id=""
                               placeholder="experience" value="<?php echo e($career->experience); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Publish Date <span class="text-danger"></span></label>

                    <div class="col-lg-6">

                        <?php echo Form::date('publish_date',$career->publish_date,['class'=>'form-control','placeholder'=>'Select The Class','id'=>'section']); ?>


                        
                            
                            
                        
          
                        
                    </div>



                </div>

                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Expire Date <span class="text-danger"></span></label>

                    <div class="col-lg-6">

                        <?php echo Form::date('expire_date',$career->expire_date,['class'=>'form-control','placeholder'=>'Select The Class','id'=>'section']); ?>


                        
                            
                            
            
          
                        

                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Job Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php echo Form::textarea('job_description', $career->job_description, array('class'=>'form-control editor', 'required' => 'true')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active', null, $career->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $career->id); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>