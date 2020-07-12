<?php if($paginator->hasPages()): ?>
    <div class="nav-links" role="navigation">
        
        <?php if($paginator->onFirstPage()): ?>
            <span class="page-numbers disabled" aria-disabled="true" aria-label="<?php echo app('translator')->getFromJson('pagination.next'); ?>">«</span>

        <?php else: ?>

            <a class="page-numbers" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->getFromJson('pagination.previous'); ?>">
                «
            </a>

        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="disabled" aria-disabled="true"><span><?php echo e($element); ?></span></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <span class="page-numbers current" ><?php echo e($page); ?></span>
                    <?php else: ?>
                        <a class="page-numbers" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a class="next page-numbers" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">»</a>

        <?php else: ?>
            <span class="page-numbers disabled" aria-disabled="true" aria-label="<?php echo app('translator')->getFromJson('pagination.next'); ?>">»</span>

        <?php endif; ?>
    </div>
<?php endif; ?>
