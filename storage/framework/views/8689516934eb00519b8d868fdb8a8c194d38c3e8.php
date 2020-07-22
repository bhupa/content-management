<?php $__env->startSection('title', 'Executive Committee'); ?>
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
                <h1 class="page-title">Executive Committee</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Executive Committee</span></li>
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
                    <h2>Executive Committee</h2>
                </div>
            </div>



                <div class="row justify-content-center">
                    <div class="d-flex ">
                        <!-- login box -->


                                <div class="form-group">
                                    <select name="year" id="executive-select-btn" class="form-control">
                                        <option value="">Ecexutive Committee</option>
                                        <?php $__currentLoopData = $teamList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            

                                            <option value="<?php echo e($team->new_date); ?>" <?php if($team->new_date == date('Y')): ?> selected="selected" <?php endif; ?>><?php echo e($team->new_date); ?> &nbsp; Executive Committee</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                    </div>
                </div>





            <div class="executive-lists">
            <div class="row justify-content-center">

                <?php $__currentLoopData = $executives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>
                    <div class="col align-self-center">

                        <div class="team-top">
                            <div class="team-wrapper">
                                <?php if(file_exists('storage/'.$team->image) && $team->image != ''): ?>
                                    <img src="<?php echo e(asset('storage/'.$team->image)); ?>" alt="<?php echo e($team->name); ?>" class="team-image">
                                <?php endif; ?>

                                <div class="content-details">
                                    <h4><?php echo e($team->name); ?></h4>
                                    <h5><?php echo e($team->position->name); ?></h5>
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
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row justify-content-center  second-team-section" style="margin-top: 50px">


                <?php $__currentLoopData = $executives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key > 0  ): ?>
                        <div class="col-md-4">
                            <div class="team-top">
                                <div class="team-wrapper">
                                    <?php if(file_exists('storage/'.$team->image) && $team->image != ''): ?>
                                        <img src="<?php echo e(asset('storage/'.$team->image)); ?>" alt="<?php echo e($team->name); ?>" class="team-image">
                                    <?php endif; ?>

                                    <div class="content-details">
                                        <h4><?php echo e($team->name); ?></h4>
                                        <h5><?php echo e($team->position->name); ?></h5>
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
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

            </div>
            </div>
        </div>

    </section>





















































    <?php echo $__env->make('event.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('gallery.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('blog.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>


        </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>