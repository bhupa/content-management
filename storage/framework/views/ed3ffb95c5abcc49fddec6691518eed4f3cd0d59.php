<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/tablednd.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="<?php echo e(asset('backend/tablednd.js')); ?>"></script>
    <script>
        
            
                
            
            
                
                
                    
                    
                    
                        
                        
                        
                        
                        
                            
                            
                            
                                
                                
                                
                                
                                
                            
                        
                    
                
            
        

        
            
                
                
                
                    
                    
                    
                    
                    
                    
                
                    
                        
                            
                            
                            
                                
                            
                            
                            
                                
                                
                                
                                    
                                    
                                
                                    
                                    
                                
                            
                            
                                
                                    
                                
                                    
                                
                            
                        

                    
                
            

            
                
                

                
                    
                    
                    
                    
                    
                    
                
                    

                        
                            
                            
                            
                                
                                
                            
                            
                                
                                
                                
                                
                            
                            
                                
                                    
                                
                                    
                                
                            
                        
                    
                
            
        
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Booking</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Booking</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Banners</h5>
            <div class="heading-elements">
                
                    
                        
                        
                        
                    
                    
            </div>
        </div>
        <div class="panel-body">
            <table class="table datatable-column-search-inputs defaultTable">
                <thead>
                <tr>
                    <th>S. No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact</th>
                    <th>Product</th>
                    <th>Reference</th>
                    
                    <th></th>
                </tr>
                </thead>
                <tbody id="sortable">


                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="item-<?php echo e($booking->id); ?>">

                        <td><?php echo e($key  + $bookings->firstItem()); ?></td>
                        <td>
                          <?php echo e($booking->first_name); ?>

                        </td>
                        <td><?php echo e($booking->last_name); ?></td>
                        <td><?php echo e($booking->contact); ?></td>
                        <td><?php echo e($booking->product); ?></td>
                        <td><?php echo e($booking->refrence); ?></td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
                <tfoot>
                <tr>
                    <th>S. No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact</th>
                    <th>Product</th>
                    <th>Refrence</th>
                    
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>