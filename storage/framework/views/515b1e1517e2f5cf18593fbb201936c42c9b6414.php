<?php $__env->startSection('title', 'Members'); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    <div id="custom-header"
         <?php if(file_exists('storage/'.$setting->value) && $setting->value != ''): ?>
         style="background-image: url('<?php echo e(asset('storage/'.$setting->value)); ?>')"
        <?php endif; ?>
    >
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title">Member</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Member</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->


    <section class="message team-section team-page" >
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Members</h2>
                </div>
            </div>
            <div class="executive-lists">
                <div class="row justify-content-center  second-team-section" style="margin-top: 0px">


                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="team-top">
                                    <div class="team-wrapper">
                                        <?php if(file_exists('storage/'.$team->image) && $team->image != ''): ?>
                                            <img src="<?php echo e(asset('storage/'.$team->image)); ?>" alt="<?php echo e($team->name); ?>" class="team-image">
                                        <?php endif; ?>

                                        <div class="content-details">
                                            <h4><?php echo e($team->name); ?></h4>
                                            <p><?php echo e($team->address); ?></p>
                                        </div>

                                        <ul class="team-social-link">
                                            <li>
                                                <a href="<?php if($team->facebook !== ''): ?> <?php echo e($team->facebook); ?> <?php else: ?> # <?php endif; ?>"> <i class="fa fa-facebook"></i> </a>
                                            </li>
                                            <li>
                                                <a href="<?php if($team->linkedin !== ''): ?> <?php echo e($team->linkedin); ?> <?php else: ?> # <?php endif; ?>"> <i class="fa fa-linkedin"></i> </a>
                                            </li>
                                            <li>
                                                <a href="<?php if($team->twitter !== ''): ?> <?php echo e($team->twitter); ?> <?php else: ?> # <?php endif; ?>"> <i class="fa fa-twitter"></i> </a>
                                            </li>
                                        </ul>
                                    </div>




                                </div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="more-wrapper">
                            <nav class="navigation pagination"> <?php echo e($members->links('vendor.pagination.custom')); ?>

                                
                                
                                
                                
                                
                                 </nav>
                            <br>
                            <br>
                            <br>
                        </div>
                </div>
            </div>
        </div>

    </section>

    <?php echo $__env->make('event.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('blog.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>


    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>