<div id="sidebar-primary" class="sidebar widget-area" >
    <div class="sidebar-widget-wrapper">
        <aside class="widget recent-posts-widget">
            <h3 class="widget-title"><span class="widget-title-wrapper">Latest News</span><a class="more-link viewall sidelink" href="<?php echo e(route('news.index')); ?>">View All</a></h3>
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="recent-post-item">
                    <?php if(file_exists('storage/'.$new->image) && $new->image !== ''): ?>
                        <img class="alignleft" src="<?php echo e(asset('storage/'.$new->image)); ?>" alt="<?php echo e($new->title); ?>" />
                    <?php endif; ?>
                    
                    <h4><a href="<?php echo e(route('news.show',[$new->slug])); ?>" ><?php echo e(str_limit($new->title,'50','....')); ?></a></h4>
                    <p><?php echo e($new->published_date->format('M d Y')); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </aside>
        <aside class="widget widget-recent-entries">
            <h3 class="widget-title">Gallery <a class="more-link viewall sidelink" href="<?php echo e(route('gallery.index')); ?>">View All</a></h3>
            <ul class="side-gallery">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallerie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('gallery.show',[$gallerie->slug])); ?>">
                            <?php if(file_exists('storage/'.$gallerie->image) && $gallerie->image != ''): ?>
                                <img alt="<?php echo e($gallerie->title); ?>" src="<?php echo e(asset('storage/'.$gallerie->image)); ?>">
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </aside>
        <!-- .widget-recent-entries -->

    </div>
    <!-- .sidebar-widget-wrapper -->
</div>