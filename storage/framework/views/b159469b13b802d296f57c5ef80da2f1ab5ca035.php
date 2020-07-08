<?php if($paginator->hasPages()): ?>
<ul class="navigation pagination">
    <div class="nav-links">
        


        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="page-numbers disabled"><span class="page-link"><?php echo e($element); ?></span></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="page-numbers current"><span class="page-link"><?php echo e($page); ?></span></li>
                    <?php else: ?>
                        <li class="page-numbers"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a class="page-numbers next" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">Next</a>
        <?php else: ?>
            <li class="page-numbers next"><span class="page-link">next</span></li>

        <?php endif; ?>
    </div>

</ul>
<?php endif; ?>
