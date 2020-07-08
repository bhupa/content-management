<?php if($paginator->hasPages()): ?>
    <nav class="nav-pagination">
        <div class="pagination">
            
            <?php if($paginator->onFirstPage()): ?>
                <span class="page-link">Previous</span></span>
            <?php else: ?>
                <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">Previous</a>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <span class="page-link"><?php echo e($element); ?></span>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <span class="page-item page-link current"><?php echo e($page); ?></span>
                        <?php else: ?>
                            <a class="page-item page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <a class="page-item page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">Next</a>
            <?php endif; ?>
        </div>
    </nav>
<?php endif; ?>

    
        
            
        
        
      
        
        
      
        
        

        
        
            
        
    
