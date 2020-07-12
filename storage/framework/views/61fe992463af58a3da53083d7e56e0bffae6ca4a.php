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