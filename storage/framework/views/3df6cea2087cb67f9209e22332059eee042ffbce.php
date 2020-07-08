<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/tablednd.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="<?php echo e(asset('backend/tablednd.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Job Application Details</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Job Application Details</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Job Application Details</h5>
            <div class="heading-elements">
                
                
                
                
                
                
                
            </div>
        </div>
        <div class="panel-body">
            <strong>Position:</strong><?php echo e($application->career->position); ?><br/>
            <strong>Name:</strong><?php echo e($application->name); ?><br/>
            <strong>Email:</strong><?php echo e($application->email); ?><br/>
            <strong>Phone:</strong><?php echo e($application->phone); ?><br/>
            <strong>Subject:</strong><?php echo e($application->subject); ?><br/>
            <strong>Message:</strong><?php echo $application->message; ?><br/>
              <a href="<?php echo e(asset($application->file)); ?>" class="btn btn-info legitRipple ">
              Download
            </a><br/>

        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>