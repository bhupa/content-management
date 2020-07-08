<?php $__env->startSection('title', 'Services List'); ?>
<?php $__env->startSection('header_js'); ?>
    <script type="text/javascript">

        $('div.alert').delay(3000).slideUp(300);


    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <div id="pagebackground" style="background:url(<?php echo e(asset('frontend/img/slider3.jpg')); ?>);" class="parallax-bg">
    </div>
    <!--    Page Background    -->


    <section id="services-home" >
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($service->title == 'Services'  && $service->title !== ''): ?>
                        <div class="col col-xs-12 col-sm-4 col-md-3">
                            <h1 class="main-title"><?php echo e($service->title); ?></h1>
                        </div>
                        <div class="col col-xs-12 col-sm-8 col-md-9">
                            <div class="main-title-txt"><?php echo $service->short_description; ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col col-xs-12">
                    <div class="row">
                        <ul class="service-ul">
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="col col-xs-12 col-sm-6 col-md-4">
                                    <div> <i class="icon">
                                            <?php if(file_exists('storage/'.$service->icon_image) && $service->icon_image !== ''): ?>
                                                <img src="<?php echo e(asset('storage/'.$service->icon_image)); ?>" alt="<?php echo e($service->title); ?>">
                                            <?php endif; ?>
                                        </i>
                                        <h3><a href="<?php echo e(route('services.show',[$service->slug])); ?>"><?php echo e(str_limit($service->title,'20','...')); ?></a></h3>
                                        <div class="service-text"><?php echo str_limit($service->description,'80',''); ?></div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        
            
                
                    
                
                    
                
                
                    
                
                    
                
                

                    
                    
                        
                            
                                
                                
                                    
                                            
                                                
                                            
                                        
                                        
                                        
                                    
                                
                             

                            
                        
                    
                


            
        
    
    <?php echo $__env->make('frontend.inc.feedbackform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--    Services    -->




    <!-- Content area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>