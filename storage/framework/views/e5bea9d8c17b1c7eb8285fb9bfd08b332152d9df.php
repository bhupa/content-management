<section class="message team-section home-team-section" >
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2>Executive Committee</h2>
            </div>
        </div>


        <div class="row justify-content-center">

            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">

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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</section>
