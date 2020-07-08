<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/visualization/d3/d3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/plugins/visualization/d3/d3_tooltip.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/pages/dashboard.js')); ?>"></script>
    <script>
        $(document).ready(function () {


        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Dashboard</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-lg-8">

            <!-- Marketing campaigns -->

































































        </div>

    </div>
    <!-- /dashboard content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>